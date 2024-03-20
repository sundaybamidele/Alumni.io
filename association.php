 <!-- Masthead -->
 <?php 
include 'admin/db_connect.php'; 
?>
<header class="masthead">
    <div class="container h-100">
        <div class="row h-100 align-items-center justify-content-center text-center">
            <div class="col-lg-10 align-self-end mb-4" style="background: #0000002e;">
                <h1 class="text-uppercase text-white font-weight-bold">Association</h1>
                <hr class="divider my-4" />
            </div>
        </div>
    </div>
</header>

<!-- Leadership Section -->
<section class="page-section">
    <div class="container">
        <h2 class="text-center text-uppercase text-secondary mb-0">Leadership</h2>
        <hr class="divider my-4" />
        <!-- Add content specific to the Leadership section here -->
        <div class="row">
            <div class="col-lg-4 col-sm-6">
                <div class="team-member">
                    <img class="mx-auto" src="/alumni/assets/img/alumni1.jpg" alt="Leader 1">
                    <h4>John Doe</h4>
                    <p class="text-muted">President</p>
                </div>
            </div>
            
            <div class="col-lg-4 col-sm-6">
                <div class="team-member">
                <img class="mx-auto" src="/alumni/assets/img/alumni1.jpg" alt="Leader 2">
                    <h4>Jane Smith</h4>
                    <p class="text-muted">Vice President</p>
                </div>
            </div>
            
            <div class="col-lg-4 col-sm-6">
                <div class="team-member">
                <img class="mx-auto" src="/alumni/assets/img/alumni1.jpg" alt="Leader 3">
                    <h4>Michael Johnson</h4>
                    <p class="text-muted">Secretary</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="page-section bg-light">
    <div class="container">
        <h2 class="text-center text-uppercase text-secondary mb-0">Testimonials</h2>
        <hr class="divider my-4" />
        <div class="row">
            <div class="col-lg-12">
                <div class="testimonial">
                    <img class="mx-auto rounded-circle" src="/alumni/assets/img/alumni1.jpg" alt="Alumni 1">
                    <p class="lead">"Being a part of this alumni community has been an incredible journey. The support and connections I've made here have been invaluable in both my personal and professional life."</p>
                    <h5 class="text-muted">John Doe, Class of 2024</h5>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-lg-6">
                <div class="testimonial">
                    <img class="mx-auto rounded-circle" src="/alumni/assets/img/alumni1.jpg" alt="Alumni 2">
                    <p class="lead">"The memories and friendships I forged during my time in this alma mater are everlasting. The alumni network continues to provide a sense of belonging and opportunities for growth."</p>
                    <h5 class="text-muted">Jane Smith, Class of 2024</h5>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="testimonial">
                    <img class="mx-auto rounded-circle" src="/alumni/assets/img/alumni1.jpg" alt="Alumni 3">
                    <p class="lead">"I'm proud to be an alum of this institution. The skills and knowledge gained here have been instrumental in shaping my career. The alumni events are always a highlight!"</p>
                    <h5 class="text-muted">Michael Johnson, Class of 2024</h5>
                </div>
            </div>
        <!-- Add content specific to the Testimonials section here -->
    </div>
</section>

<!-- About Section -->
<section class="page-section">
    <div class="container">
        <?php echo html_entity_decode($_SESSION['system']['about_content']) ?>
    </div>
</section>