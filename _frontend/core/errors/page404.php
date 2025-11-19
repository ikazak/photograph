<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Out of Focus (Red/Black Theme)</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                    colors: {
                        'primary-dark': '#000000', // Changed to pure black
                        'primary-text': '#ffffff', // Added white for general text
                        'accent-red': '#ff3366', // Bright red accent color
                    }
                }
            }
        }
    </script>
    <style>
        /* BASE STYLES */
        /* Updated shadow to use the new accent-red for the glow */
        .shadow-photo {
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.7), 0 0 10px rgba(255, 51, 102, 0.7);
        }

        /* --- 1. ICON ANIMATION (PULSE & GLITCH) --- */
        @keyframes pulse-glitch {
            0%, 100% {
                /* Updated box-shadow glow color to red */
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.7), 0 0 10px rgba(255, 51, 102, 0.7);
                transform: scale(1) rotate(0deg);
                opacity: 1;
            }
            50% {
                /* Updated box-shadow glow color to red */
                box-shadow: 0 15px 40px rgba(0, 0, 0, 0.9), 0 0 18px rgba(255, 51, 102, 1);
                transform: scale(1.03) rotate(1deg);
                opacity: 1;
            }
            52%, 54% {
                /* A quick "glitch" or "skip" */
                transform: translate(-1px, 1px) scale(1.02);
                opacity: 0.95;
            }
        }

        .animate-icon-glitch {
            animation: pulse-glitch 4s infinite ease-in-out;
        }

        /* --- 2. TEXT ANIMATION (FADE IN UP) - NO CHANGE NEEDED --- */
        @keyframes fade-in-up {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in {
            animation: fade-in-up 0.8s ease-out both;
        }
        
        /* Apply staggered delays to content elements */
        #content-container > *:nth-child(1) { animation-delay: 0.1s; } /* Icon */
        #content-container > *:nth-child(2) { animation-delay: 0.3s; } /* 404 */
        #content-container > *:nth-child(3) { animation-delay: 0.5s; } /* Page is out of focus */
        #content-container > *:nth-child(4) { animation-delay: 0.7s; } /* Detailed explanation */
        #content-container > *:nth-child(5) { animation-delay: 0.9s; } /* Button */


        /* --- 3. SUBTLE BACKGROUND VIGNETTE (LIGHT LEAK) --- */
        @keyframes light-leak {
            0% { background-position: 0% 0%; opacity: 0.05; }
            50% { background-position: 100% 100%; opacity: 0.08; }
            100% { background-position: 0% 0%; opacity: 0.05; }
        }

        body {
            position: relative;
            overflow: hidden;
        }

        /* Updated light leak to use the red accent color */
        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 0;
            /* Updated to use a red glow effect */
            background: radial-gradient(circle at 10% 90%, rgba(255, 51, 102, 0.15), transparent 50%), 
                        radial-gradient(circle at 90% 10%, rgba(255, 51, 102, 0.1), transparent 50%);
            background-size: 200% 200%;
            animation: light-leak 25s infinite ease-in-out;
        }

        #content-container {
            z-index: 10;
            position: relative;
        }

        /* --- 4. 404 TEXT GLITCH ANIMATION --- */
        /* Retained the red/cyan glitch for a classic digital static look */
        @keyframes glitch-text {
            0%, 100% { text-shadow: none; transform: translate(0); }
            10% { text-shadow: -1px 0 2px red, 1px 0 2px cyan; transform: translate(-1px, 0); }
            15% { text-shadow: 1px 0 2px red, -1px 0 2px cyan; transform: translate(1px, 0); }
            20% { text-shadow: -1px 0 2px red, 1px 0 2px cyan; transform: translate(-1px, 0); }
            25% { text-shadow: 1px 0 2px red, -1px 0 2px cyan; transform: translate(1px, 0); }
            26% { text-shadow: none; transform: translate(0); }
        }
        .animate-glitch-text {
            animation: glitch-text 6s infinite ease-in-out;
        }

        /* --- 5. SCANNER BEAM ANIMATION --- */
        @keyframes scan {
            0% { transform: translateX(-100%); }
            100% { transform: translateX(100%); }
        }
        .scanner-text {
            position: relative;
            display: inline-block;
            overflow: hidden;
            color: #ff3366; /* Ensure the text is visible (accent red) */
        }
        /* Create the moving pseudo-element that acts as the scanner beam */
        .scanner-text::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            /* Gradient for the beam effect (now brighter white/transparent) */
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.6), transparent);
            transform: translateX(-100%);
            animation: scan 4s infinite linear;
        }

        /* --- 6. BUTTON HOVER DEPTH EFFECT --- */
        .btn-depth-hover {
            /* Initial shadow for the red button */
            box-shadow: 0 4px 15px rgba(255, 51, 102, 0.3); 
        }

        .btn-depth-hover:hover {
            /* Add a subtle perspective tilt and raise on hover */
            transform: scale(1.05) rotateX(2deg) translateY(-2px);
            /* Updated hover shadow to a stronger red glow */
            box-shadow: 0 10px 20px rgba(255, 51, 102, 0.6);
        }

    </style>
</head>
<body class="font-sans bg-primary-dark text-primary-text min-h-screen flex items-center justify-center p-4">

    <div id="content-container" class="text-center max-w-xl w-full">

        <div class="mx-auto w-32 h-32 mb-8 bg-gray-900 rounded-xl flex items-center justify-center p-4 shadow-photo animate-icon-glitch animate-fade-in">
            <svg class="w-20 h-20 text-accent-red" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.45 4h3.19a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 15a3 3 0 11-6 0 3 3 0 016 0z"></path>
            </svg>
        </div>

        <h1 class="text-9xl font-extrabold text-gray-700 tracking-wider animate-fade-in animate-glitch-text">
            4<span class="text-accent-red">0</span>4
        </h1>

        <p class="text-3xl sm:text-4xl font-light text-primary-text mt-4 mb-6 animate-fade-in">
            Oops! This <span class="scanner-text font-semibold">page is out of focus.</span>
        </p>
        
        <p class="text-lg text-gray-400 mb-10 max-w-md mx-auto animate-fade-in">
            It looks like the link you followed is blurry. We couldn't find this page in our digital darkroom.
        </p>

        <a href="/" class="inline-flex items-center justify-center px-8 py-3 text-lg font-medium text-primary-dark bg-accent-red border border-transparent rounded-full shadow-lg transition duration-300 btn-depth-hover focus:outline-none focus:ring-4 focus:ring-red-500 focus:ring-opacity-50 animate-fade-in">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
            Back to the Studio (Homepage)
        </a>
    </div>

</body>
</html>