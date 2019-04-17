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
    <div class="input-group mb-3">
      <input
        type="text"
        class="form-control"
        placeholder="Search for gene, variant, drug, chemical..."
        aria-label="Recipient's username"
        aria-describedby="button-addon2"
      >
      <div class="input-group-append">
        <button class="btn btn-primary" type="button" id="btn-search">Search</button>
      </div>
    </div>
<div class="text-center">
    <br>
    <br>   
     <br>
    <br>  
     <br>
    <br>  
     <br>
    <br>  
     <br>
    <br>  
    <h2 >Pharmacogenetics</h2>
    <br>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p><br>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Dui ut ornare lectus sit amet est placerat. Elementum integer enim neque volutpat ac tincidunt. Gravida neque convallis a cras semper auctor neque. Sapien pellentesque habitant morbi tristique senectus et. Fringilla urna porttitor rhoncus dolor purus non. Amet mauris commodo quis imperdiet. Tellus at urna condimentum mattis pellentesque id. </p>
</div>
   </div>
    <img src="storage/assets/separador.png" width="100%"/>  
    <div class="container">
      <div class="row" margin="auto">
		<div class="col-sm-4 col-md-3">
			<div class="progress" data-percentage="20">
				<span class="progress-left">
					<span class="progress-bar"></span>
				</span>
				<span class="progress-right">
					<span class="progress-bar"></span>
				</span>
				<div class="progress-value">
					<div>
						20%<br>
						<span>completed</span>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-4 col-md-3">
			<div class="progress" data-percentage="40">
				<span class="progress-left">
					<span class="progress-bar"></span>
				</span>
				<span class="progress-right">
					<span class="progress-bar"></span>
				</span>
				<div class="progress-value">
					<div>
						40%<br>
						<span>completed</span>
					</div>
				</div>
			</div>
		</div>
		
		<div class="col-sm-4 col-md-3">
			<div class="progress" data-percentage="80">
				<span class="progress-left">
					<span class="progress-bar"></span>
				</span>
				<span class="progress-right">
					<span class="progress-bar"></span>
				</span>
				<div class="progress-value">
					<div>
						80%<br>
						<span>completed</span>
					</div>
				</div>
			</div>
		</div>
		
		
		<div class="col-sm-4 col-md-3">
			<div class="progress" data-percentage="100">
				<span class="progress-left">
					<span class="progress-bar"></span>
				</span>
				<span class="progress-right">
					<span class="progress-bar"></span>
				</span>
				<div class="progress-value">
					<div>
						100%<br>
						<span>completed</span>
					</div>
				</div>
			</div>
		</div>
		
		
		
	</div>
        </div>  
    </div>


</template>
<script>
export default {};
</script>

<style>
#search_container > h1 {
  color: #0c5a89;
}

#btn-search {
  width: 150px;
}
.input-group {
  -webkit-box-shadow: 0px 9px 7px -2px rgba(171, 166, 171, 1);
  -moz-box-shadow: 0px 9px 7px -2px rgba(171, 166, 171, 1);
  box-shadow: 0px 9px 7px -2px rgba(171, 166, 171, 1);
}


</style>
<style lang="scss">

//styling
$borderWidth: 7px;
$animationTime: 1.5s;
$border-color-default: #eee;
$border-color-fill:#0083ff;
$size: 150px;

//Create how many steps
$howManySteps: 10; //this needs to be even. 
//for fun try using 20 and changine in the HTML the data-percentage to 15 or 85

.progress {
  width: $size;
  height: $size;
  line-height: $size;
  background: none;
  margin: 0 auto;
  box-shadow: none;
  position: relative;
  &:after {
    content: "";
    width: 100%;
    height: 100%;
    border-radius: 50%;
    border: $borderWidth solid $border-color-default;
    position: absolute;
    top: 0;
    left: 0;
  }
  > span {
    width: 50%;
    height: 100%;
    overflow: hidden;
    position: absolute;
    top: 0;
    z-index: 1;
  }
  .progress-left {
    left: 0;
  }
  .progress-bar {
    width: 100%;
    height: 100%;
    background: none;
    border-width: $borderWidth;
    border-style: solid;
    position: absolute;
    top: 0;
    border-color: $border-color-fill;
  }
  .progress-left .progress-bar {
    left: 100%;
    border-top-right-radius: ($size/2);;
    border-bottom-right-radius: ($size/2);;
    border-left: 0;
    -webkit-transform-origin: center left;
    transform-origin: center left;
    //animation: loading-2 1.5s linear forwards 1.8s;
  }
  .progress-right {
    right: 0;
    .progress-bar {
      left: -100%;
      border-top-left-radius: ($size/2);;
      border-bottom-left-radius: ($size/2);;
      border-right: 0;
      -webkit-transform-origin: center right;
      transform-origin: center right;
      //animation: loading-1 1.8s linear forwards;
    }
  }
  .progress-value {
    display: flex;
    border-radius: 50%;
    font-size: 36px;
    text-align: center;
    line-height: 20px;
    align-items: center;
    justify-content: center;
    height: 100%;
    //font-family: $work-sans;
    font-weight: 300;
    div {
      margin-top: 10px;
    }
    span {
      font-size: 12px;
      text-transform: uppercase;
    }
  }
}

/* This for loop creates the 	necessary css animation names 
Due to the split circle of progress-left and progress right, we must use the animations on each side. 
*/
@for $i from 1 through $howManySteps {
	$stepName: ($i*(100 / $howManySteps));

	//animation only the left side if below 50%
	@if $i <= ($howManySteps/2) { 
		.progress[data-percentage="#{$stepName}"] {
			.progress-right .progress-bar {
				 animation: loading-#{$i} $animationTime linear forwards;
			}
			.progress-left .progress-bar {animation: 0;}
		}
	}
	//animation only the right side if above 50%
	@if $i > ($howManySteps/2)  {  
		.progress[data-percentage="#{$stepName}"] {
			.progress-right .progress-bar {
				animation: loading-#{($howManySteps/2)} $animationTime linear forwards; //set the animation to longest animation
			}
			.progress-left .progress-bar {
      animation: loading-#{$i - ($howManySteps/2)} $animationTime linear forwards $animationTime;
    }
		}
	}
}

//animation
@for $i from 1 through ($howManySteps/2) { 
	$degrees: (180/($howManySteps/2));
	$degrees: ($degrees*$i);
	@keyframes loading-#{$i}{
    0%{
        -webkit-transform: rotate(0deg);
        transform: rotate(0deg);
    }
    100%{
        -webkit-transform: rotate($degrees);
			transform: rotate(#{$degrees}deg);
    }
	}
}
//additional styling
.progress {
		margin-bottom: 1em;
	}
</style>

