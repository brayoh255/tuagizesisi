<?php
// Start session and include configuration
require_once 'includes/config.php';
require_once 'includes/functions.php';

// Set page title
$page_title = "Fast & Reliable Parcel Delivery Services";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title; ?></title>
    <style>
        /* TUAGIZE SISI Banner Styles */
        .tuagize-banner {
            width: 100%;
            background-color:rgb(255, 157, 0);
            color: white;
            padding: 12px 0;
            text-align: center;
            font-family: Arial, sans-serif;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            position: relative;
            z-index: 1000;
        }
        
        .tuagize-logo {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 8px;
            letter-spacing: 1px;
            color: black;
        }
        
        .tuagize-contacts {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 20px;
            margin-top: 8px;
        }
        
        .contact-item {
            display: flex;
            align-items: center;
        }

        span{
            color: black;
        }
        
        .contact-item span {
            margin-left: 8px;
            font-size: 15px;
        }
        
        .phone-icon::before {
            content: "📞";
            margin-right: 5px;
        }
        
        /* Base Styles */
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #3498db;
            --accent-color: #e74c3c;
            --light-color:rgb(0, 0, 0);
            --dark-color: #2c3e50;
            --text-color: #333;
            --text-light: #7f8c8d;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: var(--text-color);
            margin: 0;
            padding: 0;
        }
        
        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
        }
        
        /* Enhanced Slideshow Styles */
        .slideshow-container {
            position: relative;
            width: 100%;
            height: 80vh;
            min-height: 600px;
            overflow: hidden;
            margin-top: 70px;
        }
        
        .slide {
            position: absolute;
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            transition: transform 1s ease-in-out, opacity 1s ease-in-out;
            transform: scale(1.1);
            opacity: 0;
            will-change: transform, opacity;
        }
        
        .slide.active {
            transform: scale(1);
            opacity: 1;
            z-index: 1;
        }
        
        .slide-content {
            background-color: rgba(255, 255, 255, 0.85);
            padding: 40px;
            border-radius: 15px;
            max-width: 800px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            transform: translateY(50px);
            opacity: 0;
            transition: all 0.8s ease 0.3s;
        }
        
        .slide.active .slide-content {
            transform: translateY(0);
            opacity: 1;
        }
        
        .slide h2 {
            font-size: 3rem;
            margin-bottom: 20px;
            color: rgb(255, 157, 0);
            text-shadow: 1px 1px 3px rgba(0,0,0,0.3);
        }
        
        .slide p {
            font-size: 1.3rem;
            margin-bottom: 30px;
            color: #333;
            font-weight: 500;
        }
        
        .slide-btn {
            display: inline-block;
            padding: 12px 30px;
            background-color: rgb(255, 157, 0);
            color: black;
            text-decoration: none;
            border-radius: 30px;
            font-weight: bold;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(255, 157, 0, 0.4);
        }
        
        .slide-btn:hover {
            background-color: black;
            color: rgb(255, 157, 0);
            transform: translateY(-5px);
            box-shadow: 0 6px 20px rgba(255, 157, 0, 0.6);
        }
        
        /* Slide navigation */
        .slide-nav {
            position: absolute;
            bottom: 40px;
            left: 0;
            right: 0;
            text-align: center;
            z-index: 10;
        }
        
        .nav-dot {
            display: inline-block;
            width: 15px;
            height: 15px;
            margin: 0 8px;
            background-color: rgba(255,255,255,0.5);
            border-radius: 50%;
            cursor: pointer;
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }
        
        .nav-dot.active, .nav-dot:hover {
            background-color: rgb(255, 157, 0);
            transform: scale(1.2);
            border-color: white;
        }
        
        /* Navbar Styles (unchanged) */
        .navbar {
            background-color: #fff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 999;
            transition: all 0.3s ease;
        }

        .navbar.scrolled {
            background-color: rgba(255, 255, 255, 0.95);
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.15);
        }

        .navbar .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 20px;
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
        }

        .logo {
            font-size: 24px;
            font-weight: 700;
            color: #333;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .logo span {
            color: rgb(255, 157, 0);
        }

        .logo:hover {
            transform: scale(1.05);
        }

        .navbar-nav {
            display: flex;
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .nav-item {
            position: relative;
        }

        .nav-link {
            display: flex;
            align-items: center;
            padding: 15px 20px;
            color: #333;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .nav-link i {
            margin-right: 8px;
            font-size: 16px;
        }

        .nav-link:hover {
            color: rgb(255, 157, 0);
            transform: translateY(-3px);
        }

        .nav-link.active {
            color: rgb(255, 157, 0);
        }

        .nav-link.active::after {
            content: '';
            position: absolute;
            bottom: 10px;
            left: 20px;
            width: calc(100% - 40px);
            height: 2px;
            background-color: rgb(255, 157, 0);
            animation: underline 0.3s ease forwards;
        }

        /* Close Button Styles */
        .nav-close-btn {
            display: none;
            position: absolute;
            top: 15px;
            right: 20px;
            font-size: 24px;
            cursor: pointer;
            color: #333;
            transition: all 0.3s ease;
        }

        .nav-close-btn:hover {
            color: rgb(255, 157, 0);
            transform: rotate(90deg);
        }

        /* Hamburger Menu */
        .hamburger {
            display: none;
            cursor: pointer;
            padding: 10px;
        }

        .bar {
            display: block;
            width: 25px;
            height: 3px;
            margin: 5px auto;
            background-color: #333;
            transition: all 0.3s ease;
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .slideshow-container {
                height: 70vh;
                min-height: 500px;
            }
            
            .slide h2 {
                font-size: 2.2rem;
            }
            
            .slide p {
                font-size: 1.1rem;
            }
            
            .slide-content {
                padding: 30px;
            }
            
            .hamburger {
                display: block;
            }

            .hamburger.active .bar:nth-child(1) {
                transform: translateY(8px) rotate(45deg);
            }

            .hamburger.active .bar:nth-child(2) {
                opacity: 0;
            }

            .hamburger.active .bar:nth-child(3) {
                transform: translateY(-8px) rotate(-45deg);
            }

            .navbar-nav {
                position: fixed;
                top: 0;
                left: -100%;
                width: 100%;
                height: 100vh;
                background-color: #fff;
                flex-direction: column;
                text-align: center;
                transition: 0.3s;
                box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
                z-index: 999;
                padding-top: 70px;
            }

            .navbar-nav.active {
                left: 0;
            }

            .nav-close-btn {
                display: block;
            }

            .nav-item {
                margin: 15px 0;
            }

            .nav-link {
                justify-content: center;
                padding: 15px;
                font-size: 18px;
            }

            .nav-link i {
                font-size: 20px;
            }

            .nav-link.active::after {
                bottom: 5px;
                left: 50%;
                transform: translateX(-50%);
                width: 50%;
                animation: underlineMobile 0.3s ease forwards;
            }

            @keyframes underlineMobile {
                from { width: 0; }
                to { width: 50%; }
            }
        }
        
        @media (max-width: 480px) {
            .slideshow-container {
                height: 60vh;
                min-height: 400px;
            }
            
            .slide h2 {
                font-size: 1.8rem;
            }
            
            .slide-content {
                padding: 20px;
            }
            
            .slide p {
                font-size: 1rem;
            }
            
            .slide-btn {
                padding: 10px 20px;
            }
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- React and ReactDOM from CDN -->
    <script src="https://unpkg.com/react@18/umd/react.development.js"></script>
    <script src="https://unpkg.com/react-dom@18/umd/react-dom.development.js"></script>
    <script src="https://unpkg.com/@babel/standalone/babel.min.js"></script>
</head>
<body>
    <!-- Responsive Navbar -->
    <nav class="navbar">
        <div class="container">
            <div class="navbar-brand">
                <a href="index.php" class="logo">TUAGIZE <span>SISI</span></a>
                <div class="hamburger" id="hamburger">
                    <span class="bar"></span>
                    <span class="bar"></span>
                    <span class="bar"></span>
                </div>
            </div>
            <ul class="navbar-nav" id="navbarNav">
                <li class="nav-close-btn" id="navClose">
                    <i class="fas fa-times"></i>
                </li>
                <li class="nav-item">
                    <a href="index.php" class="nav-link active">
                        <i class="fas fa-home"></i>
                        <span>HOME</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="services.php" class="nav-link">
                        <i class="fas fa-concierge-bell"></i>
                        <span>SERVICES</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="contact.php" class="nav-link">
                        <i class="fas fa-phone-alt"></i>
                        <span>CONTACT</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Slideshow Container (will be managed by React) -->
    <div id="slideshow-root"></div>

    <!-- Rest of your page content would go here -->

    <script type="text/babel">
        // React Slideshow Component
        const Slideshow = () => {
            const slides = [
                {
                    id: 1,
                    title: "TUAGIZE SISI",
                    description: "",
                    bgImage: "assets/images/warehouse-hero.jpg",
                    showContacts: true
                },
                {
                    id: 2,
                    title: "Nationwide Coverage",
                    description: "Serving all regions with our extensive network of delivery professionals",
                    bgImage: "assets/images/transport-hero.jpg",
                    showContacts: false
                },
                {
                    id: 3,
                    title: "Secure Storage Solutions",
                    description: "State-of-the-art warehousing for your goods before delivery",
                    bgImage: "assets/images/warehouse-hero.jpg",
                    showContacts: false
                },
                {
                    id: 4,
                    title: "Fast & Reliable Delivery",
                    description: "We deliver your packages with care and on time, anywhere in the country",
                    bgImage: "assets/images/delivery-hero.jpg",
                    showContacts: false
                }
            ];

            const [currentSlide, setCurrentSlide] = React.useState(0);
            const [isTransitioning, setIsTransitioning] = React.useState(false);

            React.useEffect(() => {
                const interval = setInterval(() => {
                    nextSlide();
                }, 3000);
                
                return () => clearInterval(interval);
            }, [currentSlide]);

            const nextSlide = () => {
                setIsTransitioning(true);
                setTimeout(() => {
                    setCurrentSlide((prev) => (prev === slides.length - 1 ? 0 : prev + 1));
                    setIsTransitioning(false);
                }, 1000);
            };

            const goToSlide = (index) => {
                if (index === currentSlide) return;
                setIsTransitioning(true);
                setTimeout(() => {
                    setCurrentSlide(index);
                    setIsTransitioning(false);
                }, 1000);
            };

            return (
                <div className="slideshow-container">
                    {slides.map((slide, index) => (
                        <div 
                            key={slide.id}
                            className={`slide ${index === currentSlide ? 'active' : ''}`}
                            style={{
                                backgroundImage: `linear-gradient(rgba(255, 255, 255, 0.7), rgba(0, 0, 0, 0.3)), url(${slide.bgImage})`
                            }}
                        >
                            <div className="slide-content">
                                <h2>{slide.title}</h2>
                                {slide.description && <p>{slide.description}</p>}
                                {slide.showContacts && (
                                    <div className="tuagize-contacts">
                                        <div className="contact-item phone-icon">
                                            <span style={{fontWeight: 'bolder'}}>HEAD OFFICE: +255 713 389 440</span> 
                                        </div>
                                        <div className="contact-item phone-icon">
                                            <span style={{fontWeight: 'bolder'}}>KARIAKOO OFFICE: +255 763 281 111</span>
                                        </div>
                                    </div>
                                )}
                                {!slide.showContacts && (
                                    <a href="services.php" className="slide-btn">Learn More</a>
                                )}
                            </div>
                        </div>
                    ))}
                    
                    <div className="slide-nav">
                        {slides.map((_, index) => (
                            <span 
                                key={index}
                                className={`nav-dot ${index === currentSlide ? 'active' : ''}`}
                                onClick={() => goToSlide(index)}
                            ></span>
                        ))}
                    </div>
                </div>
            );
        };

        // Render the React component
        const root = ReactDOM.createRoot(document.getElementById('slideshow-root'));
        root.render(<Slideshow />);
    </script>

    <script>
        // Mobile Menu Toggle (vanilla JS)
        const hamburger = document.getElementById('hamburger');
        const navMenu = document.getElementById('navbarNav');
        const navClose = document.getElementById('navClose');

        hamburger.addEventListener('click', () => {
            hamburger.classList.toggle('active');
            navMenu.classList.toggle('active');
            document.body.style.overflow = 'hidden';
        });

        navClose.addEventListener('click', () => {
            hamburger.classList.remove('active');
            navMenu.classList.remove('active');
            document.body.style.overflow = '';
        });

        document.querySelectorAll('.nav-link').forEach(link => {
            link.addEventListener('click', () => {
                hamburger.classList.remove('active');
                navMenu.classList.remove('active');
                document.body.style.overflow = '';
            });
        });

        // Navbar scroll effect
        window.addEventListener('scroll', () => {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // Set active link based on current page
        document.querySelectorAll('.nav-link').forEach(link => {
            if (link.href === window.location.href) {
                link.classList.add('active');
            }
        });
    </script>
</body>
</html>