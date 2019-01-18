<!DOCTYPE html>
<html>

<head>
  <title>Footer with social icons</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body>
  <div class="content">
  </div>
  <footer id="myFooter">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-1">
          
        </div>
        <div class="col-sm-4 myCols">
           <div class="footer-copyright">
            <h5>KingStay</h5>
            <div class="row">
              <div class="col-sm-2"><br>
                <img src="/insta.jpg" style="margin-top:-20px; ;width: 30px">
              </div>
              <div class="col-sm-2">
              <p class=""><font size="5"><a href="https://www.instagram.com/Kingstay/" class="fa fa-instagram">smilecoffee001</a></font></p>
            </div>
            </div>
              <div class="row">
              <div class="col-sm-2"><br>
                <img src="/gmail.png" style="margin-top:-20px; ;width: 30px">
              </div>
              <div class="col-sm-2">
              <p class=""><font size="5"><a href="https://www.gmail.com/kingstay@gmail.com/" class="fa fa-instagram">smilecoffee001</a></font></p><br><br>
            </div>
            </div>
          </div>
        </div>
        <div class="col-sm-2 myCols">
          <h5>About Us</h5>
          <ul>
            <li><a href="#" ><center>Kingstay</center></a></li>
            <li><a href="#">Created at&nbsp;:&nbsp;15-Dec-2018</a></li>
            <li>
              <p>Institut Teknologi Del</p>
              <p>© 2018 Copyright </p></li>
            </ul>
          </div>

          
        <div class="col-sm-4 myCols">
          <h5>Contact</h5>
          <ul>
            <li><a href="#"><center><br></center>
             <img src="/wa.png" style="width: 40px;">
           081282480790(Sogumontar Simangunsong)</a>
           <br><a href="">081282480790(Kristopel Lumbantoruan)</a>
           <br><a href="">081282480790(Gita Nadapdap)</a></li>

         </ul>
       </div>
       <div class="col-sm-1">
         
       </div>
     </div>
   </div>


 </footer>


</body>
<style>
#myFooter {
  background-color: #373a48;
  color:white;
}

#myFooter .footer-copyright{
  background-color: #38737;
  padding-top:3px;
  padding-bottom:3px;
  text-align: center;
}

#myFooter .footer-copyright p{
  margin:10px;
  color: #ccc;
}

#myFooter ul{
  list-style-type: none;
  padding-left: 0;
  line-height: 1.7;

}

#myFooter h5{
  font-size: 18px;
  color: white;
  font-weight: bold;
  margin-top: 30px;
}

#myFooter a{
  color:#d2d1d1;
  text-decoration: none;
}

#myFooter a:hover, #myFooter a:focus{
  text-decoration: none;
  color:white;
}

#myFooter .myCols{
  text-align: center;
}

#myFooter .social-networks{
  text-align: center;
  padding-top: 30px;
  padding-bottom: 38px;
}

#myFooter .social-networks a{
  font-size: 32px;
  margin-right: 5px;
  margin-left: 5px;
  color: #f9f9f9;
  padding: 10px;
  transition: 0.2s;
}

#myFooter .social-networks a:hover{
  text-decoration: none;

}

#myFooter .facebook:hover{
  color:#0077e2;
}

#myFooter .google:hover{
  color:#ef1a1a;
}

#myFooter .twitter:hover{
  color: #00aced;
}

@media screen and (max-width: 767px){
  #myFooter {
    text-align: center;
  }
}



/* CSS used for positioning the footers at the bottom of the page. */
/* You can remove this. */


html{
  height: 100% !important;
}

body{
  display: flex;
  display: -webkit-flex;
  flex-direction: column;
  -webkit-flex-direction: column;
  height: 100%;
}

.content{
  flex: 1 0 auto;
  -webkit-flex: 1 0 auto;
  min-height: 200px;
}

#myFooter{
  flex: 0 0 auto;
  -webkit-flex: 0 0 auto;
}
</style>
</html>
