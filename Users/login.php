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
        :root {
            --accent-maroon: #811331; /* Your requested color */
            --bg-light: #fdf2f4; /* A very light tint of the maroon for the background */
            --text-main: #1d1d1f;
            --text-muted: #86868b;
            --glass-bg: rgba(255, 255, 255, 0.85);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            /* Updated Gradient Background to match the new color scheme */
            background: linear-gradient(135deg, var(--bg-light) 0%, #e0c5cc 100%);
            padding: 20px;
        }

        .login-wrapper {
            width: 100%;
            max-width: 950px;
            background: var(--glass-bg);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            display: flex;
            border-radius: 30px;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.5);
            /* Updated shadow color */
            box-shadow: 0 20px 60px rgba(129, 19, 49, 0.15);
        }

        /* Left Side: Illustration Section */
        .login-illustration {
            flex: 1.1;
            padding: 60px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            background: rgba(255, 255, 255, 0.2);
        }

        .login-illustration h1 {
            font-size: 38px;
            font-weight: 800;
            line-height: 1.2;
            color: var(--text-main);
            margin-bottom: 20px;
        }

        .login-illustration p {
            color: var(--text-muted);
            font-size: 16px;
        }

        /* Right Side: Form Section */
        .login-form-container {
            flex: 0.9;
            padding: 60px;
            background: #ffffff;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        /* Role Selector Refined */
        .role-selector {
            display: flex;
            background: #f3f4f6;
            padding: 4px;
            border-radius: 12px;
            margin-bottom: 30px;
            position: relative;
        }

        .role-option {
            flex: 1;
            text-align: center;
            cursor: pointer;
            z-index: 1;
            font-size: 14px;
            font-weight: 600;
            color: var(--text-muted);
            padding: 12px 0;
            transition: color 0.3s ease;
        }

        .role-option input[type="radio"] {
            display: none;
        }

        .role-selector::before {
            content: '';
            position: absolute;
            top: 4px;
            left: 4px;
            width: calc(50% - 4px);
            height: calc(100% - 8px);
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            z-index: 0;
        }

        .role-selector:has(input[value="student"]:checked)::before {
            transform: translateX(100%);
        }

        .role-option:has(input:checked) {
            /* Changed to maroon */
            color: var(--accent-maroon);
        }

        /* CakePHP Form Styling Overrides */
        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-size: 13px;
            font-weight: 600;
            color: var(--text-main);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .form-group input {
            width: 100%;
            padding: 14px 18px;
            font-size: 14px;
            background: #F9F9F9;
            border: 1px solid #EEEEEE;
            border-radius: 14px;
            transition: all 0.3s ease;
        }

        .form-group input:focus {
            outline: none;
            background: #FFFFFF;
            /* Changed to maroon focus */
            border-color: var(--accent-maroon);
            box-shadow: 0 0 0 4px rgba(129, 19, 49, 0.1);
        }

        .options {
            text-align: right;
            margin-bottom: 30px;
            font-size: 13px;
        }

        .options a {
            color: var(--text-muted);
            text-decoration: none;
        }

        .login-btn {
            width: 100%;
            padding: 16px;
            /* Changed button to maroon */
            background: var(--accent-maroon);
            border: none;
            border-radius: 16px;
            color: #ffffff;
            font-size: 16px;
            font-weight: 700;
            cursor: pointer;
            box-shadow: 0 8px 20px rgba(129, 19, 49, 0.3);
            transition: all 0.3s ease;
        }

        .login-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 24px rgba(129, 19, 49, 0.4);
            /* Subtle hover darkening */
            background: #6a0f28;
        }

        .footer {
            margin-top: 30px;
            font-size: 12px;
            color: #bdc3c7;
            text-align: center;
        }

        @media (max-width: 850px) {
            .login-illustration { display: none; }
            .login-wrapper { max-width: 450px; }
        }
    </style>
</head>
<body>

    <div class="login-wrapper">
        <div class="login-illustration">
            <h1 style="color: var(--accent-maroon);">Attendify<br></h1>
            <p>Access your attendance, subjects, and academic performance in one place.</p>
            <div style="margin-top: 40px; opacity: 0.9;">
                <img src="<?= $this->Url->webroot('webroot/img/attend pic.jpg') ?>" alt="Branding" style="width: 100%; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.1);">
            </div>
        </div>

        <div class="login-form-container">
            
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
                    <?= $this->Form->control('email', [
                        'label' => 'Email Address',
                        'placeholder' => 'Enter your email',
                        'required' => true
                    ]) ?>
                </div>

                <div class="form-group">
                    <?= $this->Form->control('password', [
                        'label' => 'Password',
                        'placeholder' => 'Enter your password',
                        'required' => true
                    ]) ?>
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
    </div>

</body>
</html>