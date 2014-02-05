<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(0);
class Administrator extends CI_Controller
{

    // Call the Model constructor
    public function __construct()
    {

        parent::__construct();

	    //load files
        $this->load->model('administratorlogin');
        $this->load->model('administratorcategory');
        $this->load->model('student_quiz_desc');
        $this->load->model('model_teacher');
        $this->load->model('adminstuquiz');
        $this->load->model('quiz_metadata');
	    $this->load->model('adminquiz');
	    $this->load->model('adminquestion');
	    $this->load->helper('url');
	    $this->load->library('session');
	    $this->load->helper('form');
    }

    //for admin login
    public function index()
    {

        $this->load->view('admin/login_header');
        $this->load->view('admin/login_index');
        $this->load->view('admin/login_footer');
    }

    //for logout and unset session
    public function logout()
    {
        $this->session->unset_userdata('1', TRUE);
        $this->administratorlogin->redirectTop(SITE_URL . 'administrator/index/' . time());
    }

    //admin login validation check.
    public function validateCheck()
    {

        $username = isset($_REQUEST['user_name']) ? $_REQUEST['user_name'] : '';
        $password = isset($_REQUEST['password']) ? $_REQUEST['password'] : '';

        $username = strip_tags(mysql_real_escape_string($username));
        $password = strip_tags(mysql_real_escape_string($password));

        $data = array('username' => $username,
            'password' => $password
        );

        $checking = $this->administratorlogin->loginInfoCheckByDb($data);
        if ($checking->chk == 0) {
            $this->load->view('admin/login_errors');
        } else {

            $this->session->set_userdata('1', TRUE);
            $this->administratorlogin->redirectTop(SITE_URL . 'administrator/category/' . time());
            exit();

        }
    }

    public function category()
    {
        if ($this->session->userdata('1') != FALSE) {
            $ajax = isset($_REQUEST['ajax']) ? $_REQUEST['ajax'] : '';
            if ($ajax == 1) {
                $this->administratorcategory->categoryDetails();
            } else {
                $error_msg = $this->uri->segment(3);
                $data['error_msg'] = $error_msg;

                $this->load->view('admin/header');
                $this->load->view('admin/category', $data);
                $this->load->view('admin/footer');
            }
        } else {
            $this->administratorlogin->redirectTop(SITE_URL . 'administrator/index/' . time());
        }
    }

    //view user information.


//add function
    public function savecategory()
    {

        if ($this->session->userdata('1') != FALSE) {
            $name = isset($_POST['name']) ? $_POST['name'] : '';
            $teacher = isset($_POST['teacher']) ? $_POST['teacher'] : '';

            $data = array(
	            'name' => $name,
                'teacher' => $teacher
                );


            $this->administratorcategory->insertDatabase('category', $data);

            $this->administratorlogin->redirectTop(SITE_URL . 'administrator/category/e1/' . time());
        } else {
            $this->administratorlogin->redirectTop(SITE_URL . 'administrator/index/' . time());
        }

    }


    //for delete Category
    public function deletecategoryById()
    {

        if ($this->session->userdata('1') != FALSE) {

            $id = $this->uri->segment(3);

            $this->administratorcategory->deleteDatabase('category', $id);

            $this->administratorlogin->redirectTop(SITE_URL . 'administrator/category/e3/' . time());
        } else {
            $this->administratorlogin->redirectTop(SITE_URL . 'administrator/index/' . time());
        }
    }


    public function editcategory()
    {


        if ($this->session->userdata('1') != FALSE) {

            $id = isset($_POST['id']) ? $_POST['id'] : '';
            $name = isset($_POST['edit_name']) ? $_POST['edit_name'] : '';
            $teacher = isset($_POST['edit_teacher']) ? $_POST['edit_teacher'] : '';


            $data = array('name' => $name,
            'teacher' =>$teacher
            );


            $this->administratorcategory->updateDatabase('category', $id, $data);

            $this->administratorlogin->redirectTop(SITE_URL . 'administrator/category/e2/' . time());
        } else {
            $this->administratorlogin->redirectTop(SITE_URL . 'administrator/index/' . time());
        }
    }


    public function quiz()
    {

        if ($this->session->userdata('1') != FALSE) {

            /* $getcategory = $this->administratorcategory->categoryDetails('category');*/


            $ajax = isset($_REQUEST['ajax']) ? $_REQUEST['ajax'] : '';
            if ($ajax == 1) {
                $this->adminquiz->quizDetails();
            } else {
                $error_msg = $this->uri->segment(3);
                $data['error_msg'] = $error_msg;

                $this->load->view('admin/header');
                $this->load->view('admin/quiz', $data);
                $this->load->view('admin/footer');
            }
        } else {
            $this->administratorlogin->redirectTop(SITE_URL . 'administrator/index/' . time());
        }

    }

    public function savequiz()
    {

        if ($this->session->userdata('1') != FALSE) {


            $title = isset($_POST['title']) ? $_POST['title'] : '';
            $description = isset($_POST['description']) ? $_POST['description'] : '';
            $category_name = isset($_POST['cat_name']) ? $_POST['cat_name'] : '';



            $data = array(
                'title' => $title,
                'description' => $description,
                'cat_name' => $category_name,

            );

            $this->adminquiz->insertDatabase('quiz', $data);

            //   $this->adminquiz->getcategory();
            $this->administratorlogin->redirectTop(SITE_URL . 'administrator/quiz/e1/' . time());
        } else {
            $this->administratorlogin->redirectTop(SITE_URL . 'administrator/index/' . time());
        }

    }

    /*
    echo "Upload: " . $_FILES["file"]["name"] . "<br>";
                           echo "Type: " . $_FILES["file"]["type"] . "<br>";
                           echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
                           echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";*/


    //for edit Configuration.
    public function editquiz()
    {


        if ($this->session->userdata('1') != FALSE) {

            $id = isset($_POST['id']) ? $_POST['id'] : '';
            $title = isset($_POST['edit_name']) ? $_POST['edit_name'] : '';
            $description = isset($_POST['edit_description']) ? $_POST['edit_description'] : '';
            $category_name = isset($_POST['cat_name']) ? $_POST['cat_name'] : '';


                $data = array('cat_name' => $category_name,
                    'title' => $title,
                    'description' => $description
                );




            $this->adminquiz->updateDatabase('quiz', $id, $data);

            $this->administratorlogin->redirectTop(SITE_URL . 'administrator/quiz/e2/' . time());
    } else {
            $this->administratorlogin->redirectTop(SITE_URL . 'administrator/index/' . time());
        }
    }

    public function deletequizById()
    {

        if ($this->session->userdata('1') != FALSE) {

            $id = $this->uri->segment(3);

            $this->adminquiz->deleteDatabase('quiz', $id);

            $this->administratorlogin->redirectTop(SITE_URL . 'administrator/quiz/e3/' . time());
        } else {
            $this->administratorlogin->redirectTop(SITE_URL . 'administrator/index/' . time());
        }
    }

    public function question()
    {

        if ($this->session->userdata('1') != FALSE) {


            $ajax = isset($_REQUEST['ajax']) ? $_REQUEST['ajax'] : '';
            if ($ajax == 1) {
                $this->adminquestion->questionDetails();
            } else {
                $error_msg = $this->uri->segment(3);
                $data['error_msg'] = $error_msg;

                $this->load->view('admin/header');
                $this->load->view('admin/question', $data);
                $this->load->view('admin/footer');
            }
        } else {
            $this->administratorlogin->redirectTop(SITE_URL . 'administrator/index/' . time());
        }

    }

    public function savequestion()
    {

        if ($this->session->userdata('1') != FALSE) {

            $quiz_name = isset($_POST['quiz_name']) ? $_POST['quiz_name'] : '';
            $question = isset($_POST['question']) ? $_POST['question'] : '';
            $points = isset($_POST['points']) ? $_POST['points'] : '';
            $time = isset($_POST['time']) ? $_POST['time'] : '';
            $question_type = isset($_POST['question_type']) ? $_POST['question_type'] : '';


            $data = array(
                'quiz_name' => $quiz_name,
                'question' => $question,
                'points' => $points,
                'time' => $time,
                'question_type' => $question_type

            );

            $this->adminquestion->insertDatabase('question', $data);


            $this->administratorlogin->redirectTop(SITE_URL . 'administrator/question/e1/' . time());
        } else {
            $this->administratorlogin->redirectTop(SITE_URL . 'administrator/index/' . time());
        }

    }


    public function editquestion()
    {


        if ($this->session->userdata('1') != FALSE) {

            $edit_quiz_name = isset($_POST['edit_quiz_name']) ? $_POST['edit_quiz_name'] : '';
            $question = isset($_POST['edit_question']) ? $_POST['edit_question'] : '';
            $points = isset($_POST['edit_points']) ? $_POST['edit_points'] : '';
            $time = isset($_POST['edit_time']) ? $_POST['edit_time'] : '';
            $question_type = isset($_POST['edit_question_type']) ? $_POST['edit_question_type'] : '';

            $data = array('quiz_name' => $edit_quiz_name,
                'question' => $question,
                'points' => $points,
                'time' => $time,
                'question_type' => $question_type);


            $this->adminquestion->updateDatabase('question', $id, $data);

            $this->administratorlogin->redirectTop(SITE_URL . 'administrator/question/e2/' . time());
        } else {
            $this->administratorlogin->redirectTop(SITE_URL . 'administrator/index/' . time());
        }
    }

    public function deletequestionById()
    {

        if ($this->session->userdata('1') != FALSE) {

            $id = $this->uri->segment(3);

            $this->adminquestion->deleteDatabase('question', $id);

            $this->administratorlogin->redirectTop(SITE_URL . 'administrator/question/e3/' . time());
        } else {
            $this->administratorlogin->redirectTop(SITE_URL . 'administrator/index/' . time());
        }
    }

    public function student()
        {

            if ($this->session->userdata('1') != FALSE) {

                $ajax = isset($_REQUEST['ajax']) ? $_REQUEST['ajax'] : '';

                if ($ajax == 1) {

                    $this->student_quiz_desc->studentDetails();
                } else {
                    $error_msg = $this->uri->segment(3);
                    $data['error_msg'] = $error_msg;

                    $this->load->view('admin/header');
                    $this->load->view('student/student_description', $data);
                    $this->load->view('admin/footer');
                }
            } else {
                $this->administratorlogin->redirectTop(SITE_URL . 'administrator/index/' . time());
            }
        }

        //view user information.



    public function savestudent()
    {

        if ($this->session->userdata('1') != FALSE) {
            $name = isset($_POST['name']) ? $_POST['name'] : '';
            $description = isset($_POST['description']) ? $_POST['description'] : '';
            $academic_performace = isset($_POST['academic_performace']) ? $_POST['academic_performace'] : '';
            $category = isset($_POST['category']) ? $_POST['category'] : '';

            $data = array('name' => $name,
            'description' => $description,
            'academic_performace' => $academic_performace,
            'category' => $category
               );

            $this->student_quiz_desc->insertDatabase('student', $data);

            $this->administratorlogin->redirectTop(SITE_URL . 'administrator/student/e1/' . time());
        } else {
            $this->administratorlogin->redirectTop(SITE_URL . 'administrator/index/' . time());
        }

    }


    //for delete Student
    public function deletestudentById()
    {

        if ($this->session->userdata('1') != FALSE) {

            $id = $this->uri->segment(3);

            $this->student_quiz_desc->deleteDatabase('student', $id);

            $this->administratorlogin->redirectTop(SITE_URL . 'administrator/student/e3/' . time());
        } else {
            $this->administratorlogin->redirectTop(SITE_URL . 'administrator/index/' . time());
        }
    }


    public function editstudent()
    {


        if ($this->session->userdata('1') != FALSE) {

            $id = isset($_POST['id']) ? $_POST['id'] : '';
            $name = isset($_POST['edit_name']) ? $_POST['edit_name'] : '';
            $description = isset($_POST['edit_description']) ? $_POST['edit_description'] : '';
            $edit_academic_performace = isset($_POST['edit_academic_performace']) ? $_POST['edit_academic_performace'] : '';
            $edit_category = isset($_POST['edit_category']) ? $_POST['edit_category'] : '';


            $data = array('name' => $name,
            'description' => $description,
           'academic_performace' => $edit_academic_performace,
           'category' => $edit_category
            );


            $this->student_quiz_desc->updateDatabase('student', $id, $data);

            $this->administratorlogin->redirectTop(SITE_URL . 'administrator/student/e2/' . time());
        } else {
            $this->administratorlogin->redirectTop(SITE_URL . 'administrator/index/' . time());
        }
    }


    public function teacher()
          {

              if ($this->session->userdata('1') != FALSE) {

                  $ajax = isset($_REQUEST['ajax']) ? $_REQUEST['ajax'] : '';

                  if ($ajax == 1) {

                      $this->model_teacher->teacherDetails();
                  } else {
                      $error_msg = $this->uri->segment(3);
                      $data['error_msg'] = $error_msg;

                      $this->load->view('admin/header');
                      $this->load->view('admin/teacher', $data);
                      $this->load->view('admin/footer');
                  }
              } else {
                  $this->administratorlogin->redirectTop(SITE_URL . 'administrator/index/' . time());
              }
          }

          //view user information.



      public function saveteacher()
      {

          if ($this->session->userdata('1') != FALSE) {
              $name = isset($_POST['name']) ? $_POST['name'] : '';
              $designation = isset($_POST['designation']) ? $_POST['designation'] : '';
              $email = isset($_POST['email']) ? $_POST['email'] : '';
              $description = isset($_POST['description']) ? $_POST['description'] : '';

              $data = array('name' => $name,
              'designation' => $designation,
              'email' => $email,
              'description' => $description
                 );


              $this->model_teacher->insertDatabase('teacher', $data);

              $this->administratorlogin->redirectTop(SITE_URL . 'administrator/teacher/e1/' . time());
          } else {
              $this->administratorlogin->redirectTop(SITE_URL . 'administrator/index/' . time());
          }

      }


      //for delete teacher
      public function deleteteacherById()
      {

          if ($this->session->userdata('1') != FALSE) {

              $id = $this->uri->segment(3);

              $this->model_teacher->deleteDatabase('teacher', $id);

              $this->administratorlogin->redirectTop(SITE_URL . 'administrator/teacher/e3/' . time());
          } else {
              $this->administratorlogin->redirectTop(SITE_URL . 'administrator/index/' . time());
          }
      }


      public function editteacher()
      {


          if ($this->session->userdata('1') != FALSE) {

              $id = isset($_POST['id']) ? $_POST['id'] : '';
              $name = isset($_POST['edit_name']) ? $_POST['edit_name'] : '';
               $designation = isset($_POST['edit_designation']) ? $_POST['edit_designation'] : '';
               $email = isset($_POST['edit_email']) ? $_POST['edit_email'] : '';
               $description = isset($_POST['edit_description']) ? $_POST['edit_description'] : '';

              $data = array('name' => $name,
              'designation' => $designation,
              'email' => $email,
             'description' => $description
              );


              $this->model_teacher->updateDatabase('teacher', $id, $data);

              $this->administratorlogin->redirectTop(SITE_URL . 'administrator/teacher/e2/' . time());
          } else {
              $this->administratorlogin->redirectTop(SITE_URL . 'administrator/index/' . time());
          }
      }
    public function stu_quiz()
        {

            if ($this->session->userdata('1') != FALSE) {

                /* $getcategory = $this->administratorcategory->categoryDetails('category');*/


                $ajax = isset($_REQUEST['ajax']) ? $_REQUEST['ajax'] : '';
                if ($ajax == 1) {
                    $this->adminstuquiz->quizstuDetails();
                } else {
                    $error_msg = $this->uri->segment(3);
                    $data['error_msg'] = $error_msg;

                    $this->load->view('admin/header');
                    $this->load->view('admin/stu_quiz', $data);
                    $this->load->view('admin/footer');
                }
            } else {
                $this->administratorlogin->redirectTop(SITE_URL . 'administrator/index/' . time());
            }

        }
    public function stu_quizdetails()
           {

               if ($this->session->userdata('1') != FALSE) {

                   /* $getcategory = $this->administratorcategory->categoryDetails('category');*/


                   $ajax = isset($_REQUEST['ajax']) ? $_REQUEST['ajax'] : '';
                   if ($ajax == 1) {
                       $this->adminstuquiz->quizstuDetails();
                   } else {
                       $error_msg = $this->uri->segment(3);
                       $data['error_msg'] = $error_msg;

                       $this->load->view('admin/header');
                       $this->load->view('admin/stu_quiz', $data);
                       $this->load->view('admin/footer');
                   }
               } else {
                   $this->administratorlogin->redirectTop(SITE_URL . 'administrator/index/' . time());
               }

           }

    public function quiz_metadata(){


        if ($this->session->userdata('1') != FALSE) {

            /* $getcategory = $this->administratorcategory->categoryDetails('category');*/


            $ajax = isset($_REQUEST['ajax']) ? $_REQUEST['ajax'] : '';
            if ($ajax == 1) {
                $this->quiz_metadata->quiz_metadatadetails();
            } else {
                $error_msg = $this->uri->segment(3);
                $data['error_msg'] = $error_msg;

                $this->load->view('admin/header');
                $this->load->view('admin/quiz_metadata', $data);
                $this->load->view('admin/footer');
            }
        } else {
            $this->administratorlogin->redirectTop(SITE_URL . 'administrator/index/' . time());
        }


    }



}

