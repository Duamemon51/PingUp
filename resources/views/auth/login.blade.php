<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Login</title>
  <style>
    /* Reset and base */
    * {
      box-sizing: border-box;
    }

    body {
      font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
      background: #f4f6f8;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      color: #2c3e50;
    }

    form {
      background: #ffffff;
      padding: 2.5rem 3rem;
      border-radius: 10px;
      box-shadow: 0 8px 20px rgba(44, 62, 80, 0.15);
      max-width: 420px;
      width: 90%;
      text-align: center;
      transition: box-shadow 0.3s ease;
    }
    form:hover {
      box-shadow: 0 12px 30px rgba(44, 62, 80, 0.25);
    }

    /* Professional Logo */
    .logo {
      font-weight: 700;
      font-size: 2.8rem;
      color: #34495e;
      letter-spacing: 2px;
      margin-bottom: 2rem;
      display: flex;
      justify-content: center;
      align-items: center;
      gap: 0.8rem;
      user-select: none;
    }

    /* Minimal icon: simple geometric shape */
    .logo-icon {
      width: 30px;
      height: 30px;
      background: #2980b9;
      border-radius: 6px;
      box-shadow: 0 2px 8px rgba(41, 128, 185, 0.4);
      flex-shrink: 0;
      position: relative;
    }
    .logo-icon::after {
      content: "";
      position: absolute;
      top: 6px;
      left: 6px;
      width: 18px;
      height: 18px;
      background: #ecf0f1;
      border-radius: 3px;
    }

    h2 {
      margin: 0 0 1.6rem 0;
      font-weight: 600;
      font-size: 1.5rem;
      color: #34495e;
    }

    input[type="email"],
    input[type="password"] {
      width: 100%;
      padding: 0.75rem 1.2rem;
      margin-bottom: 1.3rem;
      border: 1.5px solid #bdc3c7;
      border-radius: 7px;
      font-size: 1rem;
      color: #2c3e50;
      transition: border-color 0.3s ease;
    }

    input[type="email"]:focus,
    input[type="password"]:focus {
      border-color: #2980b9;
      outline: none;
      box-shadow: 0 0 6px rgba(41, 128, 185, 0.4);
    }

    button {
      width: 100%;
      padding: 0.75rem 1rem;
      background-color: #2980b9;
      color: white;
      border: none;
      border-radius: 7px;
      font-size: 1.1rem;
      cursor: pointer;
      transition: background-color 0.3s ease;
      font-weight: 700;
      letter-spacing: 0.8px;
      text-transform: uppercase;
      box-shadow: 0 4px 14px rgba(41, 128, 185, 0.35);
    }

    button:hover {
      background-color: #1c5d8b;
      box-shadow: 0 6px 18px rgba(28, 93, 139, 0.55);
    }

    a {
      display: block;
      margin-top: 1.5rem;
      color: #2980b9;
      text-decoration: none;
      font-size: 1rem;
      transition: color 0.3s ease;
    }

    a:hover {
      color: #1c5d8b;
      text-decoration: underline;
    }

    /* Responsive */
    @media (max-width: 480px) {
      form {
        padding: 2rem 1.5rem;
      }
      h2 {
        font-size: 1.3rem;
      }
      button, input[type="email"], input[type="password"] {
        font-size: 0.95rem;
      }
      .logo {
        font-size: 2.2rem;
        gap: 0.6rem;
      }
      .logo-icon {
        width: 24px;
        height: 24px;
      }
      .logo-icon::after {
        width: 14px;
        height: 14px;
        top: 5px;
        left: 5px;
      }
    }
  </style>
</head>
<body>
  <form method="POST" action="{{ route('login') }}">
    @csrf
    <div class="logo">
      <div class="logo-icon" aria-hidden="true"></div>
      PingUp
    </div>
    <h2>Welcome Back</h2>
    <input type="email" name="email" placeholder="Email" required />
    <input type="password" name="password" placeholder="Password" required />
    <button type="submit">Login</button>
    <a href="{{ route('register.form') }}">Don't have an account? Register</a>
  </form>
</body>
</html>
