<style>
    .navbar {
        border-top: 1px solid rgba(139, 143, 150, 0.6);
        border-bottom: 1px solid rgba(139, 143, 150, 0.6);
        background-color: #FFFFFF;
    }


    .nav-rightside {
        display: flex;
        justify-content: flex-end;
        align-items: center;
        gap: 2em;
    }

    .navbar-brand .logo-img {
        max-width: 55%;
        height: auto;
        margin-left: 2em;
    }

    .navbar-nav {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 2em;
        margin-right: 2em;
    }

    .nav-item .nav-link {
        color: rgba(139, 143, 150, 0.6);
        font-size: 15px;
        font-weight: bold;
    }

    .navbar-nav .active {
        color: #B49575 !important;
    }

    .nav-item .nav-link:hover {
        color: #B49575 !important;
    }

    /* Custom styles for right sidebar modal */
    .modal.right .modal-dialog {
        position: fixed;
        top: 0;
        right: 0;
        margin: 0;
        width: 300px;
        /* Adjust width as needed */
        height: 100%;
        transform: translate3d(100%, 0, 0);
        transition: transform 0.3s ease-out;
    }

    .modal.right .modal-content {
        height: 100%;
        border: 0;
        border-radius: 0;
    }

    .modal.right.show .modal-dialog {
        transform: translate3d(0, 0, 0);
    }

    .modal-header .close {
        margin: -1rem -1rem -1rem auto;
    }


    @media (min-width: 390px) {
        .navbar {
            width: 100% !important
        }

        .navbar-toggler {
            border: none !important;
        }

        .logo-img {
            max-width: 31% !important;
            height: auto !important;
            margin-left: 1rem !important;
        }

        .navbar-toggler {
            position: absolute;
            right: 1rem;
            top: 0.6rem;
        }

        .navbar-nav {
            /* gap: 0 !important; */
            /* margin-right: 0 !important; */
        }

        .navbar-collapse {
            justify-content: flex-end;
        }

        .navbar-nav {
            margin-left: auto;
            /* Ensures the navbar links are pushed to the right */
        }

        .navbar-toggler {
            position: absolute;
            right: 1rem;
            top: 0.6rem;
        }

    }
</style>
