<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Siha - QR Menu Scanner</title>
    
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Figtree', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            color: #1f2937;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }
        
        /* Header */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 3rem;
            flex-wrap: wrap;
            gap: 1rem;
        }
        
        .logo-section {
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        
        .logo {
            width: 60px;
            height: 60px;
            background: white;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }
        
        .logo img {
            width: 40px;
            height: 40px;
            object-fit: contain;
        }
        
        .brand-text h1 {
            color: white;
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 0.25rem;
        }
        
        .brand-text p {
            color: rgba(255,255,255,0.8);
            font-size: 0.9rem;
        }
        
        .auth-links {
            display: flex;
            gap: 1rem;
        }
        
        .auth-links a {
            color: white;
            text-decoration: none;
            font-weight: 600;
            padding: 0.75rem 1.5rem;
            border-radius: 12px;
            transition: all 0.3s;
            background: rgba(255,255,255,0.1);
            backdrop-filter: blur(10px);
        }
        
        .auth-links a:hover {
            background: rgba(255,255,255,0.2);
            transform: translateY(-2px);
        }
        
        /* QR Scanner Section */
        .scanner-section {
            background: white;
            border-radius: 24px;
            padding: 2.5rem;
            margin-bottom: 3rem;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            text-align: center;
        }
        
        .scanner-header {
            margin-bottom: 2rem;
        }
        
        .scanner-header h2 {
            font-size: 1.8rem;
            color: #1f2937;
            margin-bottom: 0.5rem;
        }
        
        .scanner-header p {
            color: #6b7280;
        }
        
        .scanner-container {
            max-width: 500px;
            margin: 0 auto;
            background: #f3f4f6;
            border-radius: 16px;
            overflow: hidden;
            position: relative;
            border: 3px solid #e5e7eb;
        }
        
        #reader {
            width: 100%;
            max-width: 500px;
            margin: 0 auto;
        }
        
        #reader video {
            border-radius: 12px;
        }
        
        .scanner-status {
            margin-top: 1.5rem;
            padding: 1rem;
            border-radius: 12px;
            font-weight: 600;
            transition: all 0.3s;
        }
        
        .status-pending {
            background: #dbeafe;
            color: #1e40af;
        }
        
        .status-success {
            background: #d1fae5;
            color: #065f46;
        }
        
        .status-error {
            background: #fee2e2;
            color: #991b1b;
        }
        
        .scan-icon {
            width: 80px;
            height: 80px;
            margin: 0 auto 1.5rem;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }
        
        .scan-icon svg {
            width: 40px;
            height: 40px;
            fill: white;
        }
        
        /* Cards Grid */
        .cards-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2rem;
            margin-bottom: 3rem;
        }
        
        .card {
            background: white;
            border-radius: 20px;
            padding: 2rem;
            text-decoration: none;
            color: inherit;
            transition: all 0.3s;
            box-shadow: 0 10px 40px rgba(0,0,0,0.1);
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }
        
        .card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 60px rgba(0,0,0,0.2);
        }
        
        .card-icon {
            width: 60px;
            height: 60px;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        }
        
        .card-icon svg {
            width: 30px;
            height: 30px;
            stroke: white;
        }
        
        .card-content h3 {
            font-size: 1.3rem;
            color: #1f2937;
            margin-bottom: 0.5rem;
        }
        
        .card-content p {
            color: #6b7280;
            line-height: 1.6;
            font-size: 0.95rem;
        }
        
        .card-arrow {
            align-self: flex-end;
            width: 24px;
            height: 24px;
            stroke: #f5576c;
            transition: transform 0.3s;
        }
        
        .card:hover .card-arrow {
            transform: translateX(5px);
        }
        
        /* Footer */
        .footer {
            text-align: center;
            color: rgba(255,255,255,0.8);
            padding: 2rem;
            font-size: 0.9rem;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .header {
                flex-direction: column;
                text-align: center;
            }
            
            .brand-text h1 {
                font-size: 1.5rem;
            }
            
            .scanner-section {
                padding: 1.5rem;
            }
            
            .cards-grid {
                grid-template-columns: 1fr;
            }
        }
        
        /* Loading animation */
        .loading {
            display: inline-block;
            width: 20px;
            height: 20px;
            border: 3px solid rgba(255,255,255,.3);
            border-radius: 50%;
            border-top-color: white;
            animation: spin 1s ease-in-out infinite;
        }
        
        @keyframes spin {
            to { transform: rotate(360deg); }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <div class="logo-section">
                <div class="logo">
                    <img src="{{ asset('images/1774513342 (1).png') }}" alt="Logo">
                </div>
                <div class="brand-text">
                    <h1>Siha</h1>
                </div>
            </div>
            
            @if (Route::has('login'))
                <div class="auth-links">
                    @auth
                        <a href="{{ url('/dashboard') }}">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}">Log in</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
        
       
</body>
</html>