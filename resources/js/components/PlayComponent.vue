<template >
  <div class="row p-4">
    
    <div class="col-12 col-md-3 text-center  align-self-center">
      <img class="border border-info rounded" :src="'./'+currentAudio.imagen" alt="" />
    </div>
    <div class="col-12 col-md-9">
      <h5 class="text-dark-primary">ESCUCHAS: {{currentAudio.titulo}}</h5>
      <div class="row text-center pt-3">
        <div class="col-2 align-self-center" title="podcast anterior" @click="after">
          <i class="fas fa-backward text-white" style="font-size: 25px"></i>
        </div>
        <div class="col-2 align-self-center" title="atras 5s" @click="backward">
          <i class="fas fa-undo-alt text-white" style="font-size: 25px"></i>
        </div>
        <div
          class="col-4 align-self-center text-center"
          title="play"
          @click="play"
        >
          <i
            class="fas"
            v-bind:class="{
              'fa-play-circle': play_state,
              'fa-pause-circle text-white': play_state == false,
            }"
            style="font-size: 3rem"
          ></i>
        </div>
        <div
          class="col-2 align-self-center"
          title="adelante 5s"
          @click="fordward"
        >
          <i class="fas fa-redo text-white" style="font-size: 25px"></i>
        </div>
        <div class="col-2 align-self-center" title="podcast siguiente" @click="next">
          <i class="fas fa-forward text-white" style="font-size: 25px"></i>
        </div>
        <div class="col-12">
            <div class="progress mt-3" @click="seek">
        <div
          class="progress-bar progress-bar-striped progress-bar-animated"
          role="progressbar"
          :aria-valuenow="percentcomplete"
          aria-valuemin="0"
          aria-valuemax="100"
          :style="'width:' + percentcomplete + '%'"
        ></div>
      </div>
        </div>
        <div class="col-6">
          <div class="text-dark-secondary float-left h5">
            {{ currentSeconds | convertTimeHHMMSS }}
          </div>
        </div>
        <div class="col-6">
          <div class="text-dark-secondary float-right h5">
            {{ durationSeconds | convertTimeHHMMSS }}
          </div>
        </div>
      </div>

      
    </div>
    
  </div>
</template>

<script>
var audioElement = document.createElement("audio");

export default {
  created() {
    
    this.audio = audioElement;
    this.audio.addEventListener("timeupdate", this.update);
    this.audio.setAttribute('src','./'+this.podcast[0].url)
   
  },
  data() {
    return {
      url: "",
      audio: undefined,
      play_state: true,
      current_time: 0,
      progress_bar: 0,
      currentSeconds: 0,
      durationSeconds: 0,
      position: 0,
      currentAudio: this.podcast[0],
      
      
    };
  },
  props:{
    podcast: {id:0,titulo: "", url: ""}
  },

  computed: {
    percentcomplete() {
      return parseInt((this.currentSeconds / this.durationSeconds) * 100);
    },
    podcastlist()
    {
      return JSON.stringify(this.podcast) 
    }
  },

  methods: {
    play() {
    
        
        if(this.play_state == true)
        {
        
        this.audio.currentTime = this.currentSeconds
        this.play_state = false;
        this.audio.play();
        
        }
        else
        {
          this.play_state = true
          this.audio.pause()
        }
        
      
        
        
      
    },
    update(e) {
      this.currentSeconds = parseInt(this.audio.currentTime)
      this.durationSeconds = this.audio.duration
    },
    seek(e) {
      if (!this.play_state) return;

      const el = e.target.getBoundingClientRect();
      const seekPos = (e.clientX - el.left) / el.width;

      this.audio.currentTime = parseInt(this.audio.duration * seekPos);
    },
    fordward() {
      this.audio.currentTime += 5;
    },
    backward() {
      this.audio.currentTime -= 5;
    },
    next()
    {  if(this.position < this.podcast.length)
       {
       
       this.audio.setAttribute('src','./'+this.podcast[this.position+=1].url)
       
       this.currentAudio = this.podcast[this.position]
      
       this.audio.play()
       
       }
      
      
    },
    after()
    {
        if(this.position == 0)
        {

        }
        else
        { 
           this.audio.setAttribute('src','./'+this.podcast[this.position-=1].url)
           this.currentAudio = this.podcast[this.position]
        
           this.audio.play()

        }
    }
    
  },
  filters: {
    convertTimeHHMMSS(val) {
      let hhmmss = new Date(val * 1000).toISOString().substr(11, 8);

      return hhmmss.indexOf("00:") === 0 ? hhmmss.substr(3) : hhmmss;
    },
  },
};
</script>
<style lang="scss">
.template-back {
  background-color: #242526 !important;
}
</style>