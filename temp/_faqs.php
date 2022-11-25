<section id="faq" class="section-p1">
    <div class="qs">
        <button class="accordion">
            <h4>How many days of the week do we have classes?</h4>
            <span class="material-symbols-outlined span">
                add
            </span>
        </button>
        <div class="panel">
            <p>Three times in a week. Mondays, Wednesdays and Fridays but all days of the week for the first two weeks for intensive beginner’s sew practices.</p>
        </div>

        <button class="accordion">
            <h4>What time do classes start?</h4>
            <span class="material-symbols-outlined">
                add
            </span>
        </button>
        <div class="panel">
            <p>Classes start at 9 am </p>
        </div>

        <button class="accordion">
            <h4>
                Can I customize my class time?
            </h4>
            <span class="material-symbols-outlined">
                add
            </span>
        </button>
        <div class="panel">
            <p>Talk to us here</p>
        </div>


        <button class="accordion">
            <h4>
                Do you offer payment plans?
            </h4>
            <span class="material-symbols-outlined">
                add
            </span>
        </button>
        <div class="panel">
            <p>Yes we do. Find out here</p>
        </div>


        <button class="accordion">
            <h4>
                Do you offer intermediate or advanced courses?
            </h4>
            <span class="material-symbols-outlined">
                add
            </span>
        </button>
        <div class="panel">
            <p>Yes we do, but for our upgrade courses we require applicants to come in for a pattern drafting and garment construction test, if failed applicants will be required to start a beginner level.</p>
        </div>


        <button class="accordion">
            <h4>
                Do you provide accommodation
            </h4>
            <span class="material-symbols-outlined">
                add
            </span>
        </button>
        <div class="panel">
            <p>Yes! We provide accommodation for students living outside Lagos and those who wish to stay in the school premises</p>
        </div>
    </div>

</section>


<script>
    var acc = document.getElementsByClassName("accordion");
    var i;

    for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function() {
            /* Toggle between adding and removing the "active" class,
            to highlight the button that controls the panel */
            this.classList.toggle("active");

            /* Toggle between hiding and showing the active panel */
            var panel = this.nextElementSibling;
                if (panel.style.display === "block") {
                    panel.style.display = "none";

                } else {
                    panel.style.display = "block";
                }
        });
    }
</script>