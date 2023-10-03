<?php
  require 'connect.php';
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
  </head>
  <body class="d-flex align-items-center py-4 bg-body-tertiary">
    <main class="form-signin w-100 m-auto">
      <form>
        <img class="mb-4" src="images/Fanta_EN Banner.png" alt="" width="72" >
        <h1 class="h3 mb-3 fw-normal">Please sign up</h1>
    
        <div class="form-floating">
          <input type="text" class="form-control" id="floatingEmail" placeholder="">
          <label for="student-id">Student ID</label>
        </div>
        <div class="form-floating">
          <input type="text" class="form-control" id="floatingEmail" placeholder="">
          <label for="student-name">Student Name</label>
        </div>
        <div class="form-floating">
          <select class="form-select"id="major">
          <?php
        $sql = 'select * from major order by facuity';
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
          echo "<option velue='{$row['majorID']}'>
          {$row['facuity']}-{$row['majorName']}
          </option>";
        }
        $conn->close();
        ?>
          </select>
          <label for="major-id">Major ID</label>
        </div>
       
        <div class="form-floating">
          <input type="password" class="form-control" id="floatingPassword" placeholder="">
          <label for="password">Password</label>
        </div>
        <div class="form-floating">
          <input type="password" class="form-control" id="floatingPassword" placeholder="">
          <label for="retypa-password">Retype Password</label>
        </div>
    
        <button class="btn btn-primary w-100 py-2" type="submit">Sign up</button>
        <!-- <p class="mt-5 mb-3 text-body-secondary">© 2017–2023</p> -->
      </form>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>