<template>
<div>
  <div id="search_container" class="container">
    <br>
    <br>
    <br>
    <br>
     <br>
    <br>  
    <h1>What are you loking for?</h1>
    
   
 <br>
 <br>
 
<searchbar></searchbar>

  <div id="Title__BioMed_Search">
        <h1><span>BioMed Search </span></h1>
        <svg class="Linha_1">
			<path id="Linha_1" d="M 35 0 L 260 0">
			</path>
		</svg>
</div>


<div>
	
		<div id="Lorem_ipsum_dolor_sit_amet__co">
			<span>BioMed Search is an online platform <br/>in order to help you prescribing the best medicine<br/>to each patient.</span>
		</div>		
	</div>
  </div>


 <div id="Seccao_estatistica">

	<div class="container">
    	<div class="row" id="counter">
        	<div class="col-sm-3 counter-Txt"> Drugs <span class="counter-value" :data-count="this.numDrugs">0</span><img src="storage/assets/adenina_A0_Rectangle_9_pattern.png"></div>
            <div class="col-sm-3 counter-Txt">Chemicals<span class="counter-value" :data-count="this.numChemicals">0</span><img src="storage/assets/citosina_A0_Rectangle_11_pattern.png"></div>
            <div class="col-sm-3 counter-Txt"> Genes <span class="counter-value" :data-count="this.numGenes">0</span> <img src="storage/assets/guanina_A0_Rectangle_13_pattern.png" style="width:112%"></div>
            <div class="col-sm-3 counter-Txt">Variants<span class="counter-value" :data-count="this.numVariants">0</span><img src="storage/assets/timina_A0_Rectangle_15_pattern.png"></div>
        </div>
    </div>


  </div>

   <div id="Databases_Explored">
     <div id="Title__DatabasesExplored">
        <h1><span>Databases Explored</span></h1>
        <svg class="Linha_2">
			<path id="Linha_2" d="M 35 0 L 260 0">
			</path>
		</svg>
</div>
     
   <div class="container">
       <div class="row blog">
                <div class="col-md-12">
                    <div id="blogCarousel" class="carousel slide" data-ride="carousel">

                        <ol class="carousel-indicators">
                            <li data-target="#blogCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#blogCarousel" data-slide-to="1"></li>
                        </ol>

                        <!-- Carousel items -->
                        <div class="carousel-inner">

                            <div class="carousel-item active">
                                <div class="row">
                                    <div class="col-md-4 m-auto">
                                        <a href="#">
                                            <img src="storage/assets/ID2_PharmGKB_logo_2_A0_Rectangle_23_pattern.png" alt="Image" style="max-width:100%;">
                                        </a>
                                    </div>
                                    <div class="col-md-4 m-auto">
                                        <a href="#">
                                            <img src="storage/assets/ID8a068f_31efe77e736340339e450_A0_Rectangle_25_pattern.png" alt="Image" style="max-width:100%;">
                                        </a>
                                    </div>
                                    <div class="col-md-4 m-auto">
                                        <a href="#">
                                            <img src="storage/assets/ID1280px_Drugbank_logo_svg_A0_Rectangle_27_pattern.png" alt="Image" style="max-width:100%;">
                                        </a>
                                    </div>
                                </div>
                                <!--.row-->
                            </div>
                            <!--.item-->

                        </div>
                        <!--.carousel-inner-->
                    </div>
                    <!--.Carousel-->

                </div>
            </div>
  </div>

  </div>
  <div id="Seccao_Last_News">
<div id="Last_News">
     <div id="Title__LastNews">
        <h1><span>Last News</span></h1>
        <svg class="Linha_3">
			<path id="Linha_3" d="M 80 0 L 215 0">
			</path>
		</svg>
</div>
  <table id="tb_news">
  <tr>
     <th>
    <u><h4><a class="new" href="#">Article about XPto</a></h4></u>
    <h6>4 days ago, drugBank Web Site</h6>
    </th>
    <th>
    <u><h4><a class="new" href="#">Article about pharmasusjdn</a></h4></u>
    <h6>10 days ago, Pharmgkb Web Site</h6>
    </th>
  </tr>
  <br>
  <tr>
     <th>
    <u><h4><a class="new" href="#">Article GSJKJhAabout XPto</a></h4></u>
    <h6>4 days ago, Pharmgkb Web Site</h6>
    </th>
    <th>
    <u><h4><a class="new" href="#">Article about XPto</a></h4></u>
    <h6>6 days ago, Pharmgkb Web Site</h6>
    </th>
  </tr>
  <br>
  <tr>
    <th>
    <u><h4><a class="new" href="#">Article about XPto</a></h4></u>
    <h6>4 days ago, drugBank Web Site</h6>
    </th>
    <th>
    <u><h4><a class="new" href="#">UgaSKVDNMas drticle about XPto</a></h4></u>
    <h6>4 days ago, Pharmgkb Web Site</h6>
    </th>
  </tr>
  <tr>
    <th>
    <u><h4><a class="new" href="#">Article about XPto hjsbm hbh</a></h4></u>
    <h6>4 days ago,  Web Site</h6>
    </th>
     <th>
    <u><h4><a class="new" href="#">Article about XPto</a></h4></u>
    <h6>4 days ago, NCBI Web Site</h6>
    </th>
    
  </tr>
</table>

</div>

</div>


</div>


</template>
<script>
import { CoolSelect } from 'vue-cool-select'

export default {
  components: { CoolSelect },

    data: function () {
        return {
          numGenes:0,
          numVariants:0,
          numDrugs:0,
          numChemicals:0,
          descriptionLimit: 60,
          entries: [],
          isLoading: false,
          model: null,
          
            
        
        }
  },

   
   

  methods:
  {

     


    
  },

  beforeMount()
  {
    axios.get('api/numDrugs')
      .then((response) => {
      
      console.log(response.data[0].num);
      this.numDrugs= response.data[0].num;
    })

    axios.get('api/numChemicals')
      .then((response) => {
      
      console.log(response.data[0].num);
      this.numChemicals= response.data[0].num;
    })

    axios.get('api/numGenes')
      .then((response) => {
      
      console.log(response.data[0].num);
      this.numGenes= response.data[0].num;
    })


    axios.get('api/numVariants')
      .then((response) => {
      
      console.log(response.data[0].num);
      this.numVariants= response.data[0].num;
    })
    
  },

  mounted()
  {
    
    var a = 0;
    $(window).scroll(function() {

  var oTop = $('#counter').offset().top - window.innerHeight;
  if (a == 0 && $(window).scrollTop() > oTop) {
    $('.counter-value').each(function() {
      var $this = $(this),
        countTo = $this.attr('data-count');
      $({
        countNum: $this.text()
      }).animate({
          countNum: countTo
        },

        {

          duration: 2000,
          easing: 'swing',
          step: function() {
            $this.text(Math.floor(this.countNum));
          },
          complete: function() {
            $this.text(this.countNum);
            //alert('finished');
          }

        });
    });
    a = 1;
  }

});
            //get items

            console.log(this.items);


    }
  
}


</script>

