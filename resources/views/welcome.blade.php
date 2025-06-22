<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Online Courses Carousel</title>
  <!-- Tailwind CSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Google Fonts Inter -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap" rel="stylesheet" />
  <!-- Google Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
   @vite(['resources/css/app.css', 'resources/js/app.js'])
  <style>
  @import url('https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap');
    body {
      font-family: 'Cairo', sans-serif;
    }
    /* Custom focus outline for better accessibility */
    :focus-visible {
      outline: 2px solid #0f766e; /* teal-700 */
      outline-offset: 2px;
    }
  <style>
    /* body {
      font-family: 'Inter', sans-serif;
      background-color: #ffffff;
      color: #374151; /* neutral gray-700 */
      overflow-x: hidden;
    } */
    /* Carousel styling */
    .carousel-container {
      position: relative;
      max-width: 1200px;
      margin: 4rem auto 6rem;
      padding-left: 1rem;
      padding-right: 1rem;
    }
    .carousel-track {
      display: flex;
      transition: transform 0.4s cubic-bezier(0.4,0,0.2,1);
      will-change: transform;
    }
    .carousel-slide {
      flex: 0 0 100%;
      padding: 0 0.75rem;
      box-sizing: border-box;
      max-width: 100%;
      transition: transform 0.4s ease;
    }
    @media (min-width: 768px) {
      .carousel-slide {
        flex: 0 0 33.3333%;
        max-width: 33.3333%;
      }
    }
    /* Buttons */
    .carousel-button {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      background: rgba(255 255 255 / 0.9);
      backdrop-filter: blur(10px);
      border-radius: 9999px;
      padding: 0.5rem;
      cursor: pointer;
      box-shadow: 0 0 8px rgba(0,0,0,0.1);
      border: none;
      transition: background-color 0.3s ease;
      color: #059669; /* primary green-600 */
    }
    .carousel-button:hover, .carousel-button:focus {
      background: rgba(5,150,105,0.1);
      outline: none;
    }
    .carousel-button:disabled {
      opacity: 0.3;
      cursor: default;
    }
    .carousel-button.prev {
      left: 0.5rem;
    }
    .carousel-button.next {
      right: 0.5rem;
    }
    /* Course Card */
    .course-card {
      background: #f9fafb; /* gray-50 */
      border-radius: 0.75rem;
      box-shadow: 0 4px 8px rgb(0 0 0 / 0.05);
      overflow: hidden;
      display: flex;
      flex-direction: column;
      height: 100%;
      transition: box-shadow 0.3s ease;
    }
    .course-card:hover {
      box-shadow: 0 10px 20px rgb(5 150 105 / 0.3);
    }
    .course-image img {
      width: 100%;
      height: 160px;
      object-fit: cover;
    }
    .course-content {
      flex-grow: 1;
      padding: 1rem 1.25rem 1.5rem;
      display: flex;
      flex-direction: column;
    }
    .course-title {
      font-weight: 700;
      font-size: 1.25rem;
      color: #064e3b; /* green-900 */
      margin-bottom: 0.5rem;
      line-height: 1.2;
    }
    .course-description {
      flex-grow: 1;
      font-weight: 400;
      font-size: 1rem;
      color: #4b5563; /* gray-600 */
      margin-bottom: 1rem;
    }
    .btn-enroll {
      background: linear-gradient(135deg, #10b981, #059669);
      color: white;
      font-weight: 600;
      padding: 0.5rem 1.25rem;
      border-radius: 0.5rem;
      text-align: center;
      user-select:none;
      transition: background-color 0.3s ease;
      box-shadow: 0 4px 6px rgb(5 150 105 / 0.5);
      cursor: pointer;
    }
    .btn-enroll:hover, .btn-enroll:focus {
      background: linear-gradient(135deg, #059669, #047857);
      outline: none;
    }
  </style>
</head>
<body>
  <header class="w-full max-w-6xl mx-auto px-4 py-8">
    <h1 class="text-4xl font-extrabold text-green-700">Online Courses</h1>
    <p class="mt-2 text-gray-600 max-w-xl">Browse our featured courses with an intuitive carousel. On large screens, see three courses at a time; on small devices, one course.</p>
  </header>

  <section class="carousel-container" aria-label="Online courses carousel">
    <button class="carousel-button prev material-icons" aria-label="Previous courses" id="prevBtn">chevron_left</button>
    <div class="carousel-track" id="carouselTrack">
      <!-- Course Slide 1 -->
      <article class="carousel-slide course-card" tabindex="0" aria-label="Course: Introduction to Web Development">
        <div class="course-image">
          <img src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/4f5b82be-30b1-4137-b2bd-4434c4550e14.png" alt="Illustration of web development on computer screen" />
        </div>
        <div class="course-content">
          <h2 class="course-title">Introduction to Web Development</h2>
          <p class="course-description">Learn the fundamentals of HTML, CSS, and JavaScript to build modern, responsive websites.</p>
          <button class="btn-enroll">Enroll Now</button>
        </div>
      </article>
      <!-- Course Slide 2 -->
      <article class="carousel-slide course-card" tabindex="0" aria-label="Course: Advanced JavaScript Techniques">
        <div class="course-image">
          <img src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/af565228-4bbf-4d5f-b90c-e03012e85f17.png" alt="Code snippets on screen to represent advanced JavaScript" />
        </div>
        <div class="course-content">
          <h2 class="course-title">Advanced JavaScript Techniques</h2>
          <p class="course-description">Master closures, async programming, prototypes, and more to enhance your JavaScript skills.</p>
          <button class="btn-enroll">Enroll Now</button>
        </div>
      </article>
      <!-- Course Slide 3 -->
      <article class="carousel-slide course-card" tabindex="0" aria-label="Course: UI/UX Design Fundamentals">
        <div class="course-image">
          <img src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/6fd632ea-c717-4de4-af48-a0cfd1abec4d.png" alt="User interface and user experience design concepts illustration" />
        </div>
        <div class="course-content">
          <h2 class="course-title">UI/UX Design Fundamentals</h2>
          <p class="course-description">Explore principles of user interface and experience design to create engaging digital products.</p>
          <button class="btn-enroll">Enroll Now</button>
        </div>
      </article>
      <!-- Course Slide 4 -->
      <article class="carousel-slide course-card" tabindex="0" aria-label="Course: Python for Data Science">
        <div class="course-image">
          <img src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/bc59dc51-9351-42d2-a9ac-a287a80f1ba4.png" alt="Python programming code with data science visuals" />
        </div>
        <div class="course-content">
          <h2 class="course-title">Python for Data Science</h2>
          <p class="course-description">Leverage Python libraries like pandas and NumPy to analyze and visualize data efficiently.</p>
          <button class="btn-enroll">Enroll Now</button>
        </div>
      </article>
      <!-- Course Slide 5 -->
      <article class="carousel-slide course-card" tabindex="0" aria-label="Course: Cloud Computing Basics">
        <div class="course-image">
          <img src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/b1c0ee5f-7c5d-4344-866f-6f1e421ebc17.png" alt="Cloud computing network and servers" />
        </div>
        <div class="course-content">
          <h2 class="course-title">Cloud Computing Basics</h2>
          <p class="course-description">Understand cloud infrastructures, services, and deployment models to manage scalable solutions.</p>
          <button class="btn-enroll">Enroll Now</button>
        </div>
      </article>
    </div>
    <button class="carousel-button next material-icons" aria-label="Next courses" id="nextBtn">chevron_right</button>
  </section>

  <script>
    (function(){
      const track = document.getElementById('carouselTrack');
      const prevBtn = document.getElementById('prevBtn');
      const nextBtn = document.getElementById('nextBtn');
      const slides = Array.from(track.children);
      let currentIndex = 0;

      // Determine how many slides to show per view based on screen width
      function slidesPerView() {
        return window.innerWidth >= 768 ? 3 : 1;
      }

      function updateButtons() {
        // Enable/disable buttons based on currentIndex boundaries
        if (currentIndex <= 0) {
          prevBtn.disabled = true;
        } else {
          prevBtn.disabled = false;
        }
        // Max index = total slides - visible slides
        const maxIndex = slides.length - slidesPerView();
        if (currentIndex >= maxIndex) {
          nextBtn.disabled = true;
        } else {
          nextBtn.disabled = false;
        }
      }

      function updateCarousel() {
        const spv = slidesPerView();
        const slideWidth = slides[0].getBoundingClientRect().width;
        const moveX = slideWidth * currentIndex;
        track.style.transform = translateX(-${moveX}px);
        updateButtons();
      }

      prevBtn.addEventListener('click', () => {
        if (currentIndex > 0) {
          currentIndex -= 1;
          updateCarousel();
        }
      });

      nextBtn.addEventListener('click', () => {
        if (currentIndex < slides.length - slidesPerView()) {
          currentIndex += 1;
          updateCarousel();
        }
      });

      // Update carousel on window resize
      window.addEventListener('resize', () => {
        // Reset currentIndex if out of bounds on resize
        const maxIndex = slides.length - slidesPerView();
        if (currentIndex > maxIndex) {
          currentIndex = maxIndex >= 0 ? maxIndex : 0;
        }
        updateCarousel();
      });

      // Initialize
      updateCarousel();
    })();
  </script>

</body>
</html>
