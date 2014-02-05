<?php

if(!isset($RUN)) { exit(); }

?>
<br />
<br />
<br />
<br />

<!DOCTYPE>
<html>
<head>
<title>IUQMS</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
<link rel="stylesheet" href="css/jquery.jcarousel.css" type="text/css" media="all" />
<!--[if IE 6]><link rel="stylesheet" href="css/ie6.css" type="text/css" media="all" /><![endif]-->
<link rel="shortcut icon" href="css/images/favicon.ico" />
<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="js/jquery.jcarousel.pack.js"></script>
<script type="text/javascript" src="js/func.js"></script>
</head>
<body>
<div class="shell">
  <div class="border">
    <!--`Header-->
    <div id="header">
      <div id="logo"><a href="#" class="notext">beSMART</a></div>
      <div class="socials right">
        <ul>
          <li><a href="https://www.facebook.com/IUMainCampus" class="fb">Facebook</a></li>
          <li class="last"><a href="#" class="twit">Twitter</a></li>
        </ul>
      </div>
      <div class="cl">&nbsp;</div>
    </div>
    <!--`Nav-->
    <div id="navigation">
      <ul>
        <li><a href="#" class="active">Home</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#">Login</a></li>
        <li><a href="#contact">Contact</a></li>
        <li><a href="http://www.iqra.edu.pk/main/blog/">Blog</a></li>
      </ul>
      <div class="cl">&nbsp;</div>
    </div>
    <!--`End Nav-->
    <!--`Slider-->
    <div class="slider">
          <div class="slider-nav"> <a href="#" class="left notext">1</a> <a href="#" class="left notext">2</a> <a href="#" class="left notext">3</a> <a href="#" class="left notext">4</a>
            <div class="cl">&nbsp;</div>
          </div>
          <ul>
            <li>
              <div class="item">
                <div class="text">
                  <h3><em>no more sheets</em></h3>
                  <p><em>needed</em></p>
                </div>
                <input type="hidden" name="hiddenField" id="hiddenField">
                <img src="img/slider01.jpg" alt="" /> </div>
            </li>
            <li>
              <div class="item">
                <div class="text">
                  <h3><em>online quiz</em> creation and</h3>
                <p><em>submission</em></p></div>
                <img src="img/slider02.jpg" alt="" /> </div>
            </li>
            <li>
              <div class="item">
                <div class="text">
                  <h3><em> easy</em></h3>
                  <h2><em>process</em></h2></div>
                <img src="img/slider03.jpg" alt="" /> </div>
            </li>
            <li>
              <div class="item">
                <div class="text">
                  <h3><em>fast and accurate</em></h3>
                  <h2><em>results</em></h2>
                </div>
                <img src="img/slider04.jpg" alt="" /> </div>
            </li>
          </ul>
        </div>
    <!--`End Slider-->

    <!--`End_Header-->
    <!--`Main-->
    <div id="main">
      <div id="content" class="left">
        <div class="highlight">
          <h1>Welcome</h1>
          <p>&nbsp;</p>
          <p>IUQMS is a web-based user friendly online quiz management system which  can create quizzes competitively and collaboratively by students for the  purpose of reducing the load required for a teacher and promoting interactions  among students and between the teacher and students.</p>
</div>
          <div>
                         <h3>Login Form</h3>
              <div class="col_8 last">
                                <form class="form" name="form2" id="form2" onsubmit="return loginValidation()">
                                  <div class="clearfix">
                                    <div class="input">
                                      <label>Username : </label>
                                      <div class="input">
                                        <input type="text" id="user_name" name="user_name" class="validate[required]" value=""  autocomplete="off"/>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="clearfix">
                                    <div class="input">
                                      <label>Password : </label>
                                      <div class="input">
                                        <input type="password" id="password" name="password" class="validate[required]" value=""  autocomplete="off"/>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="clearfix">
                                    <div class="input">
                                      <label></label>
                                      <div class="input"> <br>
                                        <input type="submit" class="blue button" value="Login">
                                      </div>
                                    </div>
                                  </div>
                                </form>
                              </div>
                         <div class="info">
                           <h3>This is Not for visitors</h3>
                           <p>All rights reserved by Iqra University.</p>
                         </div>
                       </div>

        <div class="details">
          <h1 id="about">About</h1>
          <div class="item">
            <p>&nbsp;</p>
            <p>The ONLINE QUIZ is a web base  application to take online test in an&nbsp;efficient manner and no time wasting for checking&nbsp;the paper. The main objective of ONLINE QUIZ is  to efficiently evaluate the candidate thoroughly through a fully automated  system that not only saves lot of time&nbsp;but also gives fast results.</p>
            <p>&nbsp;</p>
            <p>It is good source of interactivities among students and between  the teacher and students. It is done in order to improve student&lsquo;s  comprehension levels and learning motivation. </p>
            <p>&nbsp;</p>
            <p>Advantages  of the project</p>
            <p><br>
            The basic advantage of  our project is time saving.<strong> </strong>It saves time as it allows number  of students to give the exam at a time and displays the results as the test  gets over, so no need to wait for the result. It is automatically generated by  the server. &nbsp;Teacher has a privilege to create, modify and delete the test  papers and its particular questions. User can register, login and give the test  with his specific id, and can see the results as well.</p>
<div class="cl">&nbsp;</div>
          </div>
          <div class="item">
            <p><strong>Facilities provided by this project</strong></p><p><br>
              The ultimate facility of  this project is to facilitate the faculties for easy evaluation of the students  and generation of the automatic score.<br>
              The system shall display the set of  questions with certain rules.<br>
              Once the student has completed  choosing the quiz category he starts answering the questions. <br>
              The mark is given and report is  generated based on the correct answers.<br>
              The scope of this project gives  immense opportunity for the students to know their levels in quiz.<br>
              The data in this project are  maintained in the tabular form using Sqlyog in the form of database.<br>
              No data loss occurs in the quiz  system.<br>
            It is very much protected in  such a way that it gives permission to the students to access only when the  username and password is correct.</p>
            <p>The results are produced  electronically so that nobody can see only the user and the teacher knows it.</p>
            <p>&nbsp;</p>
            <p><strong>The Project  involves in the following phases:</strong></p>
            <h4><br>
              <strong>TEACHER:</strong>            </h4>
            <p><br>
              1.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Authentication phase<br>
              2.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Question generation  phase<br>
              3.    Assigned  date of the quiz</p>
            <p>&nbsp;</p>
            <h4><strong>STUDENT:</strong><br>
            </h4>
            <p>&nbsp;</p>
            <p>1.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Authentication phase<br>
              2.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Registration phase<br>
              3.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Question bank phase<br>
              4.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Result generation phase</p>
            <p>&nbsp;</p>
            <p><strong>TEACHER</strong></p>
            <p>&nbsp;</p>
            <p><strong>1) AUTHENTICATION PHASE:</strong></p>
            <p><br>
            </p>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  This proposed system is completely authenticated in order to enhance security  and corruptions of database as well as the software. A person is given access  permission to this system when he/she has got a valid username and password  i.e. the Teacher. Hence this authentication module includes two fields where  he/she has to enter the credentials the username and password. The details  include:</p>
            <p><br>
            </p>
            <p>1.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Username</p>
            <p><br>
            </p>
            <p>2.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Password</p>
            <p>&nbsp;</p>
            <p><strong>2) QUESTION GENERATION PHASE:</strong></p>
            <p><br>
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  This phase includes quiz generation phase. In this phase a teacher can perform  add, modify, delete. This phase may be the most important phase in this system,  because it is the one where the entire system gets the categorized question.  There are multiple categories of questions which can be added in this system  with respect to marks and time.</p>
            <p><br>
              <strong>3) ASSIGNED DATE AND TIME:</strong></p>
            <p><br>
              Teacher  will assign the date and time of the quiz when he generate a complete quiz.</p>
            <p>&nbsp;</p>
            <h2><strong>STUDENT</strong></h2>
            <p>&nbsp;</p>
            <p><strong>1) AUTHENTICATION PHASE:</strong> </p>
            <p><br>
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  This proposed system is completely authenticated in order to enhance security  and corruptions of database as well as the software. A person is given access  permission to this system when he/she has got a valid username and password i.e.  the Teacher. Hence this authentication module includes two fields where he/she  has to enter the credentials the username and password. The details include:</p>
            <p><br>
              1.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Username</p>
            <p><br>
              2.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Password</p>
            <p>&nbsp;</p>
            <p><strong>2) REGISTRATION PHASE:</strong></p>
            <p><br>
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  If the participant is an existing user then he can enter into the system, using  his valid username and password.<br>
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  If the participant is a new one then he has to fill the registration form. Now  valid username and password will assign to the user. Using that he can enter into  the system.</p>
            <p>&nbsp;</p>
            <p><strong>3) QUESTION BANK PHASE:</strong></p>
            <p><br>
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  This phase provides the students a set of multiple-choice questions and a set  of answers below the specific question. Once after the current question has  been answered it automatically makes a move to the second question with their  corresponding answers.</p>
            <p>&nbsp;</p>
            <p><strong>4) RESULT GENERATION PHASE:</strong></p>
            <p><br>
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  The result of the corresponding student is generated based on his, her  performance in the test. The result is generated at the end of the quiz. As the  teacher allotted the passing marks and if the secured the passing marks will be  passed otherwise failed.</p>
<div class="cl">&nbsp;</div>
          </div>
          <div class="item">
            <div class="text left">
              <h1 id="contact">Contact</h1>
              <p>&nbsp;</p>
              <p>For Placement department related queries, Email us at: </p>
              <p>placement@iqra.edu.pk</p>
              <p>&nbsp;</p>
              <p>For Degree/Transcript verficiation , Email us at: </p>
              <p>registrar@iqra.edu.pk</p>
              <p>&nbsp;</p>
              <p>Main Campus: </p>
              <p>Defence View, Shaheed-e-Millat Road (Ext.) <br>
              Karachi-75500, Pakistan</p>
              <p>&nbsp;</p>
              <p>UAN: 111-264-264 (Admission Ext. 1025, 1026)</p>
              <p>&nbsp;</p>
              <p>For more details visit official website of Iqra University. <a href="http://iqra.edu.pk">[iqra.edu.pk]</a>            </p>
            </div>
            <div class="cl">&nbsp;</div>
          </div>
        </div>
      </div>

      <div class="cl">&nbsp;</div>
    </div>
    <div class="shadow-l"></div>
    <div class="shadow-r"></div>
    <div class="shadow-b"></div>
  </div>
  <!--`End Main-->
<!--`Footer-->

  <div id="footer">
    <p class="left">Copyright &copy; 2013, Iqra University, All Rights Reserved</p>
    <p class="right">A final year project<a href="#"></a></p>
    <div class="cl"></div>
  </div>
<!--`End Footer-->
</div>
</body>
</html>