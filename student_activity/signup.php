<?php
session_start();
    require 'connect.php';
    if (isset($_POST['submit'])) {
      $studentID = $_POST['studentID'];
      $studentName = $_POST['studetName'];
      $majorID = $_POST['major'];
      $password =password_hash ($_POST['password'], PASSWORD_DEFAULT);
      $sql = "insert into student(studentId,studentName,majorID,password) 
      values('{$studentID}','{$studentName}','{$majorID}','{$password}')";
      
      try {
        $conn->query($sql);
        $_SESSION['user'] = [
          'studentId'=>$studentID,
          'studentName'=>$studentName
        ];
        header('location:index.php');
        exit;
      }
      catch(mysqli_sql_exception) {
        $err = " StudentID $studentID already exists.";
      }
      catch(Exception $e) {
        $err = $e;
      }
    }
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Activity - Signup</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
      html,
      body {
        height: 100%;
      }

      .form-signin {
        max-width: 330px;
        padding: 1rem;
      }

      .form-signin .form-floating:focus-within {
        z-index: 2;
      }

      
    </style>
    <script>
      function validate() {
        let p1 = document.querySelector('#password').value;
        let p2 = document.querySelector('#re-password').value;
        if (p1 != p2) {
          alert('Passwords are not identical.');
          event.preventDefaul();
        }
      }
      </script>
  </head>
  <body class="d-flex align-items-center py-4 bg-body-tertiary">
    <main class="form-signin w-100 m-auto">
      <form action="signup.php" method="post" onsubmit="validate()">
        <img class="mb-4" src="images/Fanta_EN Banner.png" alt="" width="72" >
        <h1 class="h3 mb-3 fw-normal">Please sign up</h1>
    <?php
    if(isset($err)) {
      echo "<div class='alert alert-danger'>$err</div>";
    }
    ?>
        <div class="form-floating">
          <input required name="studentID" type="text" class="form-control" id="floatingEmail" placeholder="">
          <label for="student-id">Student ID</label>
        </div>
        <div class="form-floating">
          <input name="studetName" type="text" class="form-control" id="floatingEmail" placeholder="">
          <label for="student-name">Student Name</label>
        </div>
        <div class="form-floating">
          <select  name="major" class="form-select" id="major">
          <?php
        $sql = 'select * from major order by facuity';
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
          echo "<option value='{$row['majorID']}'>
          {$row['facuity']}-{$row['majorName']}
          </option>";
        }
        $conn->close();
        ?>
          </select>
          <label for="major">Major</label>
        </div>
       
        <div class="form-floating">
          <input required name="password" type="password" class="form-control" id="password" placeholder="">
          <label for="password">Password</label>
        </div>
        <div class="form-floating">
          <input required type="password" class="form-control" id="re-password" placeholder="">
          <label for="retypa-password">Retype Password</label>
        </div>
    
        <button name="submit" class="btn btn-primary w-100 py-2" type="submit">Sign up</button>
        <p class="mt-5 mb-3 text-body-secondary">© 2017–2023</p>
      </form>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>