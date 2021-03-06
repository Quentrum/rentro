<?php 
 session_start(); 
 include 'header.php'; 
 

 if(isset($_SESSION['acct-id'])){
 echo "
 <script> 
  $(document).ready(function(){
      $('#save-text').addClass('notSelected');
      $('#register-text').click(function(){
          $(this).removeClass('notSelected'); 
          $(this).addClass('isSelected');
          $('#save-text').addClass('notSelected');  
      }); 
        $('#save-text').click(function(){
          $(this).removeClass('notSelected'); 
          $(this).addClass('isSelected'); 
          $('#register-text').addClass('notSelected');  
      });
  }); 
 </script>
 <body>
        <div class = 'loader-div' style = 'display:block'>
          <div class = 'loader'> </div>
        </div>
        <div class = 'container-fluid'> 
           <h1 class = 'display-1' style = 'text-align: CENTER; margin-top:30px; '> Rent Out an Item </h1>
           <span class = 'sell-upper-texts'> 
             <h3 class = 'showme-text' id='register-text' style = 'text-align: LEFT;'>Register a New Item</h3>
             <h3 class = 'showme-text' id='text-seperator' style = 'text-align: LEFT;'>|</h3>
             <h3 class = 'showme-text' id='save-text' style = 'text-align: LEFT;'>View Saved Items</h3>
           </span> 
           <h4 class = 'CS-top-text' style = 'text-align: CENTER; width:50%; margin-left:50%; transform: translateX(-50%);'> Please read and follow all directions while registering to ensure that your item is posted.
                                                                  To preserve our customer's best interests, items will be verified by Rentro before they are posted online for sale. </h4> 
           
           
           <form class = 'register-div' id = 'register-div' method = 'POST' enctype='multipart/form-data' action = '".productSubmit($conn)."'> 
             <ul class = 'register-div-ul'> 
                <li class = 'signin-form-li'><p class = 'info-text'>Please make sure that the item name is as close to the original name of the item as possible. <br> </p></li>
                <li class = 'register-div-li'><label class = 'signin-label'>Item Name:</label><input class = 'register-div-input' type = 'text' name = 'product-name'></li> 
                     <li class = 'signin-form-li'><p class = 'info-text'>Next, describe your item to the best of your ability. Please be sure to include: <br> 
                                                         * A description on the condition of your item.  <br> 
                                                         * Accessories (such as chargers or cases) that you are including with your item. <br> 
                                                         * Any special usage instructions for your item. <br> 
                                                         * Note: The more details you include, the better the chances are of you having proof of what it is you rented out in the case that you need it. </p></li>
                <li class = 'register-div-li'><label class = 'signin-label'>Item Description:</label><textarea class = 'register-div-input register-div-textarea' type = 'text' name = 'product-desc' style ='resize:none; height:150px'></textarea></li>
                     <li class = 'signin-form-li'><p class = 'info-text'>Next, you will enter how long you plan to rent out this item for. Remember: <br> 
                                                         * Please do not rent out your item for longer than you know you will not need it. Take time to consider how long you want to rent out. <br> </p></li>
                <li class = 'register-div-li'><label class = 'signin-label'>How long do you want to rent this item out for (in weeks) ?</label>  
                    <select form='register-div' class = 'register-div-input-select' name = 'product-ls' >
                      <option value = '2'>2 weeks</option> 
                      <option value = '3'>3 weeks</option> 
                      <option value = '4' selected = 'selected' >1 month</option> 
                      <option value = '12'>3 months</option>
                      <option value = '24'>6 months</option> 
                      <option value = '52'>1 year</option> 
                    </select> 
                </li>
                <li class = 'signin-form-li'><p class = 'info-text'>Now, you will enter a WEEKLY rate for your item. Please consider: <br> 
                                                         * This price is calcuated by you. Based on the pictures you send, and the original market price of the item, Rentro staff will check your price's fairness, not its exactness. <br> 
                                                         * You will get paid the total amount up front, but will also be fully expected to rent out your device for the time that you set. <br> 
                                                         * If you are confused on anything, or simply want more information, please be sure to refer to the Terms of Use, specifically the section on the Replacement Price verifying process, or you can contact Customer Services. <br> </p>
                                                          <label class = 'signin-label'>How much are you renting for per week?</label>
                                                          <input class = 'register-div-input register-div-input-rp' type = 'text' name = 'product-wp' maxlength='6' placeholder='$'>                                                 
                </li>
                <li class = 'signin-form-li'><p class = 'info-text'> Next, you will enter a replacement price for your item. When doing this, please note: <br> 
                                                         * This price is also calcuated by you. Based on the pictures you send, and the original market price of the item, Rentro staff will check your price's fairness, not its exactness. <br> 
                                                         * Please be sure to include the total prices of all included accessories in your replacement price.<br> 
                                                         * If you are confused on anything, or simply want more information, please be sure to refer to the Terms of Use, specifically the section on the Replacement Price verifying process, or you can contact Customer Services. <br> </p></li>
                <li class = 'register-div-li'><label class = 'signin-label'>Replacement Price for this item: </label><input class = 'register-div-input register-div-input-rp' type = 'text' name = 'product-rp' maxlength='6' placeholder='$'></li>  
           <li class = 'register-div-li'><p class = 'info-text'> Finally, you will take some pictures of your item, to go with your registration. Please note that: <br> 
                                                         *Taking pictures helps both you and the person who rents this item. By uploading pictures, you can verify the condition of your device at the time of registration, while also allowing consumers and Rentro staff to see the physical condition of your item.  <br> 
                                                         *Please try to take the pictures from different angles, to provide a wholesome view of the item. <br> 
                                                         *IMPORTANT: Make sure to select ALL your images at once upon submit. You will see the number of files submitted. <br> 
                                                          <br> </p> <label class = 'signin-label'>Upload at least 3 images of your item: </label> <input type='file' class = 'choose-img' name='my_file[]' multiple='multiple'></li>
            </ul> 
            <h4 class = 'TOU-text' style = 'text-align: CENTER; margin-bottom: 10px; margin-top: 80px;'> By submitting, you agree to the full <a style = 'color: #2083bf;'>Terms of Use</a></h4>
            <h2 class = 'SI-bottom-text' style = 'margin-top: 80px '> All finished?  </h2> 
            <button class = 'SI-bottom-button' name = 'submitProduct'>Register</button> 
             <h4 class = 'TOU-text' style = 'text-align: CENTER; margin-bottom: 10px; margin-top: 120px; font-size:15px;'>Not ready to post yet? <a style = 'color: #2083bf;'>Save this item instead</a></h4>
           </form> 
        </div>
    "; 
   } //end of if isset 
 else {
      header("Location: signin.php"); 
      exit();
 }

include 'footer.php';

