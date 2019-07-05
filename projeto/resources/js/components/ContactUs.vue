<template>
<div>
  

	<div class = "container">
		 <div class="jumbotron">
      <h1 align="center">Contact</h1>
    </div>
    <div class="signup-form">
		
		
			
			<p>Please fill in this form to contact us!</p>
			<hr>
   

			

			<div class="form-group">
				<div class="input-group">
					<span class="input-group-addon"><i class="far fa-user"></i></span>
					<input type="text" class="form-control" name="name" placeholder="Name" required="required" v-model="comment.name">
				</div>
			</div>
            	<div class="form-group">
				<div class="input-group">
					<span class="input-group-addon"><i class="far fa-envelope"></i></span>
					<input type="email" class="form-control" name="email" placeholder="Email Address" required="required" v-model="comment.email">
				</div>
			</div>
			<div class="form-group">
				<div class="input-group">
					<span class="input-group-addon"><i class="far fa-sticky-note"></i></span>
					<textarea type="text" class="form-control" name="message" placeholder="Message content" required="required" v-model="comment.message"></textarea>
				</div>
			</div>
		
			

	


		
			<div class="form-group">
				<button type="submit"  @click="register" class="btn btn-primary btn-lg">Send Message</button>
			</div>
 </div>
			
	</div> 
</div>         
	
</template>

<script>
export default {
   
        
        data: function () {
            return {
                comment: {
                    name:'',
                    email:'',
                    message:'',
                },
                showMessage: false,
                    
                

            }

        },
        methods:
        {
            register()
            {
                axios.post('api/contact',this.comment)
			        .then(function (response) {
                        this.showMessage = true;
                        this.typeofmsg = "alert-success";
                        this.message = "Success";

			})
            }
        }
     

}
</script>
