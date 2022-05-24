<?php

$quickLinks = '<ul class="list-group list-group-flush border-start">
<a>
    <li class="list-group-item">
        About us
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><a href="background-and-rationale.php" class="link-secondary quickLinks">Background & Rationale</a></li>
            <li class="list-group-item"><a href="legal-bases.php" class="link-secondary quickLinks">Legal Bases</a></li>
            <li class="list-group-item"><a href="vision-mission-and-objectives.php" class="link-secondary quickLinks">Vision, Mission, & Objectives</a></li>
            <li class="list-group-item"><a href="core-values.php" class="link-secondary quickLinks">Core Values</a></li>
            <li class="list-group-item"><a href="program-management.php" class="link-secondary quickLinks">Program Management</a></li>
            <li class="list-group-item"><a href="major-programs.php" class="link-secondary quickLinks">Major Programs</a></li>
            <li class="list-group-item"><a href="research-process-flow.php" class="link-secondary quickLinks">Research Process Flow</a></li>
        </ul>
    </li>
    <li class="list-group-item"><a href="events.php" class="link-secondary quickLinks">Events</a></li>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Faculty Researches
            <ul class="list-group list-group-flush">
            <li class="list-group-item"><a href="faculty-research.php" class="link-secondary quickLinks">Completed Research</a></li>
            <li class="list-group-item"><a href="faculty-research.php" class="link-secondary quickLinks">Ongoing Research</a></li>
            </ul>
            </li>
            <li class="list-group-item">Student Researches
            <ul class="list-group list-group-flush">
            <li class="list-group-item"><a href="faculty-research.php" class="link-secondary quickLinks">Completed Research</a></li>
            <li class="list-group-item"><a href="faculty-research.php" class="link-secondary quickLinks">Ongoing Research</a></li>
            </ul>
            </li>       
        </ul>
    </li>
    <li class="list-group-item">
        Journals
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><a href="scientia.php" class="link-secondary quickLinks">Scientia et Fides</a></li>
            <li class="list-group-item"><a href="patubas.php" class="link-secondary quickLinks">Patubas</a></li>
        </ul>
    </li>
    <li class="list-group-item"><a href="statistics.php" class="link-secondary quickLinks">Statistics</a></li>
    <li class="list-group-item"><a href="contact.php" class="link-secondary quickLinks">Contact Us</a></li>
</a></ul>';

echo json_encode($quickLinks);
