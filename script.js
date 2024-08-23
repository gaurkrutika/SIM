document.addEventListener('DOMContentLoaded', (event) => {
    var sideBarIsOpen = true;

    var toggleBtn = document.getElementById('toggleBtn');
    var dashboard_sidebar = document.getElementById('dashboard_sidebar');
    var dashboard_content_container = document.getElementById('dashboard_content_container');
    var dashboard_logo = document.getElementById('dashboard_logo');
    var userImage = document.getElementById('userImage');

    toggleBtn.addEventListener('click', (event) => {
        event.preventDefault();

        if (sideBarIsOpen) {
            dashboard_sidebar.style.width = '10%';
            dashboard_content_container.style.width = '90%';
            dashboard_content_container.style.transition = '0.2s all';

            dashboard_logo.style.fontSize = '60px';
            userImage.style.width = '60px';
            var menuIcons = document.getElementsByClassName('menuText');
            for (var i = 0; i < menuIcons.length; i++) {
                menuIcons[i].style.display = 'none';
            }
            document.getElementsByClassName('dashboard_menu_lists')[0].style.textAlign = 'center';
            sideBarIsOpen = false;
        } else {
            dashboard_sidebar.style.width = '20%';
            dashboard_content_container.style.width = '80%';
            dashboard_logo.style.fontSize = '80px';
            userImage.style.width = '80px';
            var menuIcons = document.getElementsByClassName('menuText');
            for (var i = 0; i < menuIcons.length; i++) {
                menuIcons[i].style.display = 'inline-block';
            }
            document.getElementsByClassName('dashboard_menu_lists')[0].style.textAlign = 'left';
            sideBarIsOpen = true;
        }
    });
});
