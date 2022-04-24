<aside class="d-flex flex-column flex-shrink-0 p-3 text-white" style="width: 280px;" bis_skin_checked="1">
    <a href="index.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <img src="assets/images/logo.png" width="40" class="me-2">
        <div>
            <p class="mb-0 fw-bold" style="font-size: 0.8rem">Central Philippine University</p>
            <small>University Research Center</small>
        </div>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="dashboard.php" class="nav-link text-white" aria-current="page">
                <i class="bi-house-door me-2"></i>
                Dashboard
            </a>
        </li>
        <?php if ($_SESSION['user_type'] == 'Admin') { ?>
        <li class="nav-item">
            <button class="align-items-start nav-link text-white" data-bs-toggle="collapse"
                data-bs-target="#user-management-collapse" aria-expanded="false">
                <i class="bi-people me-2"></i>
                User Management
                </a>
            </button>
            <div class="collapse ms-5" id="user-management-collapse" bis_skin_checked="1">
                <ul class="fw-normal pb-1 small nav nav-pills flex-column">
                    <li class="nav-item"><a href="user-management.php" class="text-white nav-link">Overview</a></li>
                    <li class="nav-item"><a href="proposals.php" class="text-white nav-link">Research Proposals</a></li>
                    <li class="nav-item"><a href="approved-research.php" class="text-white nav-link">Approved By
                            Reviewer</a></li>
                    <li class="nav-item"><a href="reviewer-panel.php" class="text-white nav-link">Reviewer/Panel</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a href="news-management.php" class="nav-link text-white">
                <i class="bi-newspaper me-2"></i>
                News Management
            </a>
        </li>
        <li class="nav-item">
            <button class="align-items-start nav-link text-white" data-bs-toggle="collapse"
                data-bs-target="#content-management-collapse" aria-expanded="false">
                <i class="bi bi-files me-2"></i>
                Content Management
                </a>
            </button>
            <div class="collapse ms-5" id="content-management-collapse" bis_skin_checked="1">
                <ul class="fw-normal pb-1 small nav nav-pills flex-column">
                    <li class="nav-item"><a href="manage-patubas.php" class="text-white nav-link">Patubas</a></li>
                    <li class="nav-item"><a href="manage-scientia.php" class="text-white nav-link">Scientia et Fides</a></li>
                    <li class="nav-item"><a href="homepage-videos.php" class="text-white nav-link">Videos</a></li>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <button class="align-items-start nav-link text-white" data-bs-toggle="collapse"
                data-bs-target="#events-management-collapse" aria-expanded="false">
                <i class="bi-archive me-2"></i>
                Events Management
                </a>
            </button>
            <div class="collapse ms-5" id="events-management-collapse" bis_skin_checked="1">
                <ul class="fw-normal pb-1 small nav nav-pills flex-column">
                    <li class="nav-item"><a href="events-creation.php" class="text-white nav-link">Overview</a></li>
                    <li class="nav-item"><a href="schedule-presentation.php" class="text-white nav-link">Schedule Presentation</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <button class="align-items-start nav-link text-white" data-bs-toggle="collapse"
                data-bs-target="#requests-collapse" aria-expanded="false">
                <i class="bi-bookmarks me-2"></i>
                Requests
                </a>
            </button>
            <div class="collapse ms-5" id="requests-collapse" bis_skin_checked="1">
                <ul class="fw-normal pb-1 small nav nav-pills flex-column">
                    <li class="nav-item"><a href="404.php" class="text-white nav-link">Download Requests</a></li>
                    <li class="nav-item"><a href="404.php" class="text-white nav-link">Citation Requests</a></li>
                </ul>
            </div>
        </li>
        <?php } ?>
        <?php if ($_SESSION['check'] == '1') { ?>
        <li class="nav-item">
            <a href="review.php" class="nav-link text-white">
                <i class="bi-archive me-2"></i>
                Assigned Proposals
            </a>
        </li>
        <?php } ?>

        <?php
        if ($_SESSION['user_type'] == 'user' || $_SESSION['user_type'] == 'Reviewer') {
        ?>
        <li class="nav-item">
            <button class="align-items-start nav-link text-white" data-bs-toggle="collapse"
                data-bs-target="#researches-collapse" aria-expanded="false">
                <i class="bi-body-text me-2"></i>
                Researches
                </a>
            </button>
            <div class="collapse ms-5" id="researches-collapse" bis_skin_checked="1">
                <ul class="fw-normal pb-1 small nav nav-pills flex-column">
                    <li class="nav-item"><a href="submission.php" class="text-white nav-link">Submit Research</a></li>
                    <li class="nav-item"><a href="ongoing-researches.php" class="text-white nav-link">Research Tracker</a></li>
                </ul>
            </div>
        </li>
        <?php
        }
        ?>
        <li class="nav-item">
            <a href="website-statistics.php" class="nav-link text-white">
                <i class="bi-bar-chart me-2"></i>
                Website Statistics
            </a>
        </li>
        <li class="nav-item">
            <a href="feedback.php" class="nav-link text-white">
                <i class="bi-chat-dots me-2"></i>
                Submit Feedback
            </a>
        </li>
    </ul>
    <hr>
    <div class="dropdown" bis_skin_checked="1">
        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1"
            data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi-person-circle me-2" style="font-size: 1.2rem"></i>

            <strong id="username">...</strong>
        </a>
        <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
            <li><a class="dropdown-item" href="profile.php">Profile</a></li>
            <li><a class="dropdown-item" href="edit-profile.php">Edit Profile</a></li>
            <li><a class="dropdown-item" href="change-password.php">Change Password</a></li>
            <li><span class="dropdown-item" style="cursor: not-allowed;">Settings</span></li>
            <li>
                <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="logout.php">Sign out</a></li>
        </ul>
    </div>
</aside>

<script>
$(function() {
    const path = window.location.pathname;
    const [currPagePath] = path.split('/').slice(-1);

    const userManagementLinks = ['user-management.php', 'reviewer-panel.php', 'proposals.php', 'approved-research.php']
    const requestsLinks = [];
    const eventManagementLinks = ['events-creation.php', 'schedule-presentation.php'];
    const researchesLinks = ['submission.php', 'ongoing-researches.php'];
    const contentLinks = ['newsletter-management.php', 'manage-patubas.php', 'manage-scientia.php', 'homepage-videos.php'];

    const validLinks = ['dashboard.php', 'review.php', 'website-statistics.php', 'news-management.php', 'newsletter-management.php', 'manage-patubas.php',
    'manage-scientia.php', 'homepage-videos.php',
    ...userManagementLinks, ...requestsLinks, ...researchesLinks, ...eventManagementLinks]


    if (validLinks.includes(currPagePath)) {
        if (userManagementLinks.includes(currPagePath)) {
            $('#user-management-collapse').addClass('show')
        }

        if (requestsLinks.includes(currPagePath)) {
            $('#requests-collapse').addClass('show')
        }

        if (eventManagementLinks.includes(currPagePath)) {
            $('#events-management-collapse').addClass('show')
        }

        if (researchesLinks.includes(currPagePath)) {
            $('#researches-collapse').addClass('show')
        }

         if (contentLinks.includes(currPagePath)) {
             $('#content-management-collapse').addClass('show')
         }

        $(`a[href='${currPagePath}']`).addClass('active');
    }

    $.ajax({
        url: 'api/get/auth.php',
        dataType: 'json',
        method: 'get',
        success: function(response) {
            $('#username').text(response.email)
        }
    });
});
</script>