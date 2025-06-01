<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
<title>Welcome to PingUp</title>
<script src="https://cdn.tailwindcss.com"></script>
<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
<style>
  /* Background gradient animation */
  @keyframes gradientBackground {
      0%, 100% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
  }
  .animated-gradient {
      background: linear-gradient(270deg, #ff6a95, #ff9472, #a18cd1, #fbc2eb);
      background-size: 800% 800%;
      animation: gradientBackground 20s ease infinite;
  }

  /* Fade In Up animation */
  @keyframes fadeInUp {
      from { opacity: 0; transform: translateY(30px); }
      to { opacity: 1; transform: translateY(0); }
  }
  .fade-in-up {
      animation: fadeInUp 1.2s ease forwards;
  }

  /* Button hover animation */
  .btn-animated {
      position: relative;
      overflow: hidden;
      transition: color 0.3s ease;
  }
  .btn-animated::before {
      content: '';
      position: absolute;
      top: 0; left: -100%;
      width: 100%;
      height: 100%;
      background: #ff6a95;
      transition: all 0.3s ease;
      z-index: -1;
      border-radius: 9999px;
  }
  .btn-animated:hover::before {
      left: 0;
  }
  .btn-animated:hover {
      color: white !important;
  }

  /* Chat container styling */
  .chat-container {
      flex: 1;
      background: #1f1f2e;
      border-radius: 1rem;
      padding: 1rem;
      display: flex;
      flex-direction: column;
      justify-content: flex-end;
      max-width: 600px;
      height: 400px;
      box-shadow: 0 0 15px rgba(255, 106, 149, 0.3);
      overflow: hidden;
  }

  /* Chat messages area */
  .chat-messages {
      flex-grow: 1;
      overflow-y: auto;
      display: flex;
      flex-direction: column;
      gap: 0.5rem;
      padding-right: 0.5rem;
      margin-bottom: 0.5rem;
      scroll-behavior: smooth;
  }

  /* Chat bubble styles */
  .chat-bubble {
      max-width: 70%;
      padding: 0.5rem 0.8rem;
      border-radius: 20px;
      font-size: 0.85rem;
      line-height: 1.2;
      opacity: 0;
      animation: bubbleFadeIn 0.5s forwards;
      word-break: break-word;
  }

  /* Left and right chat bubbles */
  .chat-bubble.left {
      background-color: #ff6a95;
      color: white;
      align-self: flex-start;
      border-bottom-left-radius: 0;
  }
  .chat-bubble.right {
      background-color: #a18cd1;
      color: white;
      align-self: flex-end;
      border-bottom-right-radius: 0;
  }

  /* Bubble fade-in animation */
  @keyframes bubbleFadeIn {
      to { opacity: 1; }
  }

  /* Staggered animation delays */
  .chat-bubble:nth-child(1) { animation-delay: 0.4s; }
  .chat-bubble:nth-child(2) { animation-delay: 1.1s; }
  .chat-bubble:nth-child(3) { animation-delay: 1.8s; }
  .chat-bubble:nth-child(4) { animation-delay: 2.5s; }
  .chat-bubble:nth-child(5) { animation-delay: 3.2s; }

  /* Chat input box */
  .chat-input {
      display: flex;
      gap: 0.3rem;
  }
  .chat-input input {
      flex-grow: 1;
      padding: 0.5rem 0.8rem;
      border-radius: 9999px;
      border: none;
      font-size: 0.85rem;
      outline: none;
      background: #2a2a3b;
      color: white;
      transition: background-color 0.3s ease;
  }
  .chat-input input::placeholder {
      color: #bbb;
  }
  .chat-input input:focus {
      background-color: #3b3b57;
  }
  .chat-input button {
      background: #ff6a95;
      border: none;
      padding: 0 1rem;
      border-radius: 9999px;
      color: white;
      font-weight: bold;
      cursor: pointer;
      transition: background 0.3s ease;
      user-select: none;
      font-size: 0.85rem;
  }
  .chat-input button:hover:not(:disabled) {
      background: #ff496e;
  }
  .chat-input button:disabled {
      opacity: 0.5;
      cursor: not-allowed;
  }

  /* Accessibility improvements */
  a:focus-visible,
  button:focus-visible,
  input:focus-visible {
      outline: 2px solid #ff6a95;
      outline-offset: 2px;
  }

  /* Animations for chat bubbles sliding */
  @keyframes slideInLeft {
    0% { transform: translateX(-40px); opacity: 0; }
    100% { transform: translateX(0); opacity: 1; }
  }
  @keyframes slideInRight {
    0% { transform: translateX(40px); opacity: 0; }
    100% { transform: translateX(0); opacity: 1; }
  }
  .animate-slide-in-left {
    animation: slideInLeft 0.6s ease forwards;
  }
  .animate-slide-in-right {
    animation: slideInRight 0.6s ease forwards;
  }

  /* Gradient text animation */
  @keyframes gradientShift {
    0% {
      background-position: 0% 50%;
    }
    50% {
      background-position: 100% 50%;
    }
    100% {
      background-position: 0% 50%;
    }
  }
  .animate-gradient-text {
    background-size: 200% 200%;
    animation: gradientShift 5s ease infinite;
  }

  /* Responsive adjustments */
  @media (max-width: 768px) {
    main {
      padding: 1rem;
      gap: 8;
      flex-direction: column;
    }
    .chat-container {
      max-width: 100%;
      height: 350px;
      padding: 0.75rem;
    }
    section {
      max-width: 100%;
    }
    h1 {
      font-size: 3rem !important;
    }
    p {
      font-size: 1rem;
    }
    .chat-input input,
    .chat-input button {
      font-size: 0.9rem;
      padding: 0.5rem 0.75rem;
    }
  }

  @media (max-width: 320px) {
    body {
      padding: 1rem !important;
    }
    header {
      max-width: 100% !important;
      font-size: 0.65rem !important;
      gap: 0.5rem !important;
    }
    main {
      padding: 0.5rem !important;
      gap: 1.5rem !important;
    }
    section h1 {
      font-size: 2rem !important;
      line-height: 1.1;
    }
    section p {
      font-size: 0.75rem !important;
    }
    .chat-container {
      height: 300px;
      padding: 0.5rem;
      max-width: 280px;
    }
    .chat-bubble {
      font-size: 0.7rem;
      padding: 0.3rem 0.6rem;
      max-width: 90%;
    }
    .chat-input input {
      font-size: 0.65rem;
      padding: 0.3rem 0.6rem;
    }
    .chat-input button {
      font-size: 0.65rem;
      padding: 0 0.75rem;
    }
    a,
    button,
    input {
      touch-action: manipulation;
    }
  }
</style>
</head>
<body class="bg-[#0a0a0a] text-white flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col animated-gradient relative overflow-hidden">

  <!-- Header with login/register links -->
  <header class="w-full lg:max-w-4xl max-w-[335px] text-sm mb-6 flex justify-end gap-4 z-20" role="banner">
    <a href="{{ route('login') }}" class="px-3 py-1 border border-transparent hover:border-white rounded-sm text-white transition" tabindex="0">
      Log in
    </a>
    <a href="{{ route('register') }}" class="px-3 py-1 border border-white rounded-sm text-white hover:bg-white hover:text-[#ff6a95] transition" tabindex="0">
      Register
    </a>
  </header>

  <!-- Main PingUp Section -->
  <main class="flex flex-col-reverse lg:flex-row items-center justify-between max-w-7xl w-full px-4 lg:px-20 gap-12 relative z-20 bg-gradient-to-br from-purple-950 via-pink-900 to-indigo-900 rounded-3xl p-8 lg:p-12 shadow-[0_20px_60px_-15px_rgba(255,0,128,0.6)]">

    <!-- Left side: Text Intro -->
    <section class="text-center lg:text-left max-w-xl space-y-6" aria-label="Introduction to PingUp">
      <h1 class="font-extrabold text-transparent text-5xl sm:text-6xl lg:text-7xl tracking-wide leading-tight bg-clip-text bg-gradient-to-r from-pink-600 via-purple-600 to-indigo-600 animate-gradient-text fade-in-up">
        Welcome to <span class="text-white">PingUp</span>
      </h1>
   <p class="text-lg sm:text-xl text-pink-300 font-semibold leading-relaxed max-w-lg fade-in-up" style="animation-delay: 0.4s;">
  PingUp is your go-to real-time chat app for seamless messaging. Connect instantly with friends, share your thoughts, and stay in touch anytime, anywhere — just like WhatsApp, but simpler and lighter.
</p>

      <a href="{{ route('dashboard') }}" class="inline-block btn-animated bg-gradient-to-r from-pink-600 via-purple-600 to-indigo-700 text-white font-semibold px-6 py-3 rounded-full shadow-lg hover:shadow-[0_0_25px_rgba(255,0,128,0.8)] transition focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-pink-600" tabindex="0">
        Let's chat
      </a>
    </section>

   <!-- Right side: Chat Container -->
<aside class="chat-container" aria-label="Chat Interface" role="region" tabindex="0">
  <!-- Chat Messages -->
  <div class="chat-messages" aria-live="polite" aria-relevant="additions" role="log" tabindex="-1">
    <div class="chat-bubble left animate-slide-in-left">Hey! What's up?</div>
    <div class="chat-bubble right animate-slide-in-right">Not much, just chilling. You?</div>
    <div class="chat-bubble left animate-slide-in-left">Same here. Want to catch up later?</div>
    <div class="chat-bubble right animate-slide-in-right">Yeah, sounds good! What time?</div>
    <div class="chat-bubble left animate-slide-in-left">How about 7 pm? We could grab some pizza.</div>
    <div class="chat-bubble right animate-slide-in-right">Perfect! See you then 😊</div>
  </div>

  <!-- Chat Input (Disabled Placeholder) -->
  <form class="chat-input mt-2" aria-label="Send a message" onsubmit="event.preventDefault();">
    <input
      type="text"
      placeholder="Type your message..."
      aria-label="Message input"
      id="messageInput"
      class="w-full rounded-l px-3 py-2 text-black"
      disabled
      autocomplete="off"
    />
    <button
      type="submit"
      id="sendButton"
      class="bg-pink-600 text-white px-4 py-2 rounded-r hover:bg-pink-700 transition"
      disabled
    >
      Send
    </button>
  </form>
</aside>


  </main>

<script>
  const input = document.getElementById('messageInput');
  const sendButton = document.getElementById('sendButton');
  const chatMessages = document.querySelector('.chat-messages');

  // Enable/disable send button based on input
  input.addEventListener('input', () => {
    sendButton.disabled = input.value.trim() === '';
  });

  // Function to append new message and simulate bot response
  function sendMessage() {
    const userText = input.value.trim();
    if (!userText) return;

    // Append user message
    const userBubble = document.createElement('div');
    userBubble.className = 'chat-bubble right animate-slide-in-right';
    userBubble.textContent = userText;
    chatMessages.appendChild(userBubble);

    // Clear input and disable send button
    input.value = '';
    sendButton.disabled = true;

    // Scroll to bottom
    chatMessages.scrollTop = chatMessages.scrollHeight;

    // Simulate bot response after a short delay
    setTimeout(() => {
      const botBubble = document.createElement('div');
      botBubble.className = 'chat-bubble left animate-slide-in-left';
      botBubble.textContent = "I'm here to help, but this demo doesn't have AI integration yet!";
      chatMessages.appendChild(botBubble);

      // Scroll again
      chatMessages.scrollTop = chatMessages.scrollHeight;
    }, 1200);
  }
</script>

</body>
</html>
