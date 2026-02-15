<?php
/**
 * @var \App\View\AppView $this
 */
$this->disableAutoLayout();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Portal | Login</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        body {
            min-height: 100vh;
            display: flex;
            margin-right: 20px;
            align-items: center;
            justify-content: center;
            background: url('<?= $this->Url->webroot('img/uitm_pundana.jpg') ?>') no-repeat center center fixed;
            background-size: cover;
        }

        .login-wrapper {
            width: 100%;
            max-width: 420px;
            background: #ffffff;
            padding: 40px 35px;
            border-radius: 14px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.25);
        }

        .login-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .login-header h1 {
            font-size: 26px;
            font-weight: 700;
            color: #055bb1;
            margin-bottom: 6px;
        }

        .login-header p {
            font-size: 14px;
            color: #95d7f1;
        }

        /* Unique Segmented Role Selector */
        .role-selector {
            display: flex;
            background: #f3f4f6;
            padding: 4px;
            border-radius: 10px;
            margin-bottom: 25px;
            position: relative;
        }

        .role-option {
            flex: 1;
            text-align: center;
            cursor: pointer;
            position: relative;
            z-index: 1;
            font-size: 14px;
            font-weight: 600;
            color: #6b7280;
            padding: 10px 0;
            transition: color 0.3s ease;
        }

        .role-option input[type="radio"] {
            display: none; /* Hide standard radio buttons */
        }

        /* The sliding highlight background */
        .role-selector::before {
            content: '';
            position: absolute;
            top: 4px;
            left: 4px;
            width: calc(50% - 4px);
            height: calc(100% - 8px);
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            z-index: 0;
        }

        /* Move the highlight when student is selected */
        .role-selector:has(input[value="student"]:checked)::before {
            transform: translateX(100%);
        }

        /* Change text color when selected */
        .role-option:has(input:checked) {
            color: #055bb1;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            font-weight: 500;
            color: #374151;
        }

        .form-group input {
            width: 100%;
            padding: 12px 14px;
            font-size: 14px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            transition: border-color 0.3s, box-shadow 0.3s;
        }

        .form-group input:focus {
            outline: none;
            border-color: #0a2540;
            box-shadow: 0 0 0 2px rgba(10, 37, 64, 0.15);
        }

        .options {
            display: flex;
            justify-content: center; /* Centered since Need Help is removed */
            align-items: center;
            margin-bottom: 25px;
            font-size: 13px;
        }

        .options a {
            color: #0a2540;
            text-decoration: none;
        }

        .options a:hover {
            text-decoration: underline;
        }

        .login-btn {
            width: 100%;
            padding: 13px;
            background: #0a2540;
            border: none;
            border-radius: 8px;
            color: #ffffff;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.3s ease;
            line-height: 1.0;
        }

        .login-btn:hover {
            background: #133b5c;
        }

        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 12px;
            color: #9ca3af;
        }

        @media (max-width: 480px) {
            .login-wrapper {
                padding: 30px 25px;
            }
        }
    </style>
</head>
<body>

    <div class="login-wrapper">
        <div class="login-header">
            <h1>Student Portal</h1>
            <p>Sign in to access your academic dashboard</p>
        </div>

        <?= $this->Flash->render() ?>

        <?= $this->Form->create(null, ['type' => 'post']) ?>
            
            <div class="role-selector">
                <label class="role-option">
                    <input type="radio" name="role" value="staff" checked>
                    Staff
                </label>
                <label class="role-option">
                    <input type="radio" name="role" value="student">
                    Student
                </label>
            </div>

            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="e.g. ST2024001" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
            </div>

            <div class="options">
                <a href="#">Forgot Password?</a>
            </div>

            <button type="submit" class="login-btn">Login</button>
        <?= $this->Form->end() ?>

        <div class="footer">
            © 2026 Academic Management System
        </div>
    </div>

</body>
</html>