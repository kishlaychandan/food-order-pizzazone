<?php include('partials-front/menu.php'); ?>


<div class="cccontainer">
  <div class="ccrow ccheader">
    <h1>CONTACT US &nbsp;</h1>
    <h3 style="">Fill out the form below to learn more!</h3>
  </div>
  <div class="ccrow ccbody">
    <form id="frm" action="#">
      <ul>
        
        <li>
          <p class="ccleft">
            <label for="first_name">first name</label>
            <input type="text" name="first_name" placeholder="John" />
          </p>
          <p class="ccpull-right">
            <label for="last_name">last name</label>
            <input type="text" name="last_name" placeholder="Smith" />      
          </p>
        </li>
        
        <li>
          <p>
            <label for="email">email <span class="req">*</span></label>
            <input type="email" name="email" placeholder="john.smith@gmail.com" />
          </p>
        </li>        
        <li><div class="ccdivider"></div></li>
        <li>
          <label for="comments">comments</label>
          <textarea cols="46" rows="3" name="comments"></textarea>
        </li>
        
        <li>
          <input class="ccbtn ccbtn-submit" type="submit" value="Submit" />
          <small>or press <strong>enter</strong></small>
        </li>
        
      </ul>
    </form>  
  </div>
</div>


<?php include('partials-front/footer.php'); ?>
