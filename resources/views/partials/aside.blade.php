<section>

    <aside class="aside-wrapper">
        <ul>
            <h6 style="color:white">LEAGUES</h6>
            <li><a href="#">WC | FIFA World Cup</a></li>
            <li><a href="#">CL | UEFA Champions League</a></li>
            <li><a href="#">BL1 | Bundesliga</a></li>
            <li><a href="#">DED | Eredivisie</a></li>
            <li><a href="#">BSA | Campeonato Brasileiro Série A</a></li>
            <li><a href="#">PD | Primera Division</a></li>
            <li><a href="#">FL1 | Ligue 1</a></li>
            <li><a href="#">ELC | Championship</a></li>
            <li><a href="#">PPL | Primeira Liga</a></li>
            <li><a href="#">EC | European Championship</a></li>
            <li><a href="#">SA | Serie A</a></li>
            <li><a href="#">PL | Premier League</a></li>
            <li><a href="#">CLI | Copa Libertadores</a></li>
        </ul>
    </aside>
    <script>
        const toggleAside = document.getElementById('toggle-aside');
        const asideWrapper = document.querySelector('.aside-wrapper');

        toggleAside.addEventListener('click', () => {
            console.log('click');
            asideWrapper.classList.toggle('show');
        });

        function checkWidth() {
            const screenWidth = window.innerWidth;

            if (screenWidth <= 768) {
                asideWrapper.classList.add('show');
            } else {
                asideWrapper.classList.remove('show');
            }
        }

        window.addEventListener('resize', checkWidth);
    </script>
</section>
