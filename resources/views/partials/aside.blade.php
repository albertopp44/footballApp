<section>

    <aside class="aside-wrapper">

        <ul>
            <h6 style="color:white">LIST</h6>
            <li><a href="/competitions">Competitions</a></li>
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
