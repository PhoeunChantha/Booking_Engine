<style>
    .section-title {
        font-size: 1.8rem;
        font-weight: 700;
    }

    .section-78rem.banner {
        margin-top: 20px !important;
        margin-bottom: 20px !important;
    }

    .section-78rem.comment-customer {
        margin-top: 20px !important;
        margin-bottom: 20px !important;
    }

    .card-footer {
        background-color: #FFFFFF;
    }

    .thumbnail-title {
        font-size: 1.2rem;
    }

    .hotel-text {
        flex: 1;
    }

    .left-image {
        /* width: 100%; */
        height: auto;
        display: flex;
        align-items: center;
        overflow: hidden;
        position: relative;

    }

    .left-image>.picture-gallery {
        display: flex;
        align-items: center;
        justify-content: center;
        float: right;
        position: absolute;
        right: 3rem;
        background-color: #FFFFFF;
        opacity: 0.8;
        border-radius: 26px;
        bottom: 0;
        margin-bottom: 2rem;
    }

    .main-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 10px;
    }

    .container-image {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .image-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        grid-template-rows: repeat(2, 1fr);
        gap: 0.5rem;
        width: 100%;
    }

    .calendar>input {
        color: #000000;
        font-weight: bold;
    }

    .calendar>.day-of-week {
        color: rgba(139, 143, 150, 0.6);
        font-weight: bold;
    }

    .select-people>#display-adults,
    #display-children {
        color: #000000;
        font-weight: bold;
    }

    .select-people>#display-rooms {
        color: rgba(139, 143, 150, 0.6);
        font-weight: bold;
    }

    .small-image {
        display: flex;
        align-items: center;
        justify-content: center;
        /* width: 22em; */
        height: auto;
        /* overflow: hidden; */

    }

    .small-image img {
        overflow: hidden;
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 10px;

    }

    .container-button {
        padding: 3px;
        padding-right: 4px;
    }

    .container-button>.button-booking {
        height: 5rem;
        background-color: #539104;
        border-radius: 10px;
        color: white;
        font-size: 20px;
        font-weight: 600;
        /* padding: 0 0 0 0; */
    }

    .container-booking {
        position: absolute;
        /* top: 1rem; */
        /* bottom: ; */
        /* display: flex; */
        align-items: center;
        justify-content: center;
        z-index: 10;
        border-radius: 9px;
        padding: 2px;

    }

    .select-people {
        position: relative;
    }

    #child_age {
        border: #B49575 1px solid;
    }

    #child_age:focus {
        border: #B49575 1px solid;
        outline: none;
    }


    .icon-dropdown {
        position: absolute;
        top: 50%;
        right: 1rem;
        transform: translateY(-50%);
    }

    .icon-dropdown i {
        color: #63E6BE;
    }

    .label {
        font-size: 1rem;
        font-weight: bold;
    }

    .label-description {
        font-size: 14px;
        color: #777;
        margin-bottom: 0;
    }

    .number {
        display: inline-block;
        width: 2rem;
        text-align: center;
    }

    .plus,
    .minus {
        background: none;
        border: none;
        padding: 0.5rem;
        cursor: pointer;
        border: 1px solid #B49575;
        cursor: pointer;
        width: 27px;
        height: 27px;
        border-radius: 50%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }

    .plus svg,
    .minus svg {
        display: inline-block;
        vertical-align: middle;
    }

    .dropdown-content {
        padding: 1rem;
    }

    .number {
        display: inline-block;
        width: 2rem;
        text-align: center;
    }

    .dim {
        opacity: 0.5;
    }

    .btn-done {
        border-radius: 2rem;
    }

    .dropdown-content {

        display: none;
        position: absolute;

        /* background-color: #f9f9f9; */
        /* box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2); */
        z-index: 1;
    }

    .dropdown-content.show {
        display: block;
        top: 5rem;
    }

    .section-welcome {
        background-color: #F2F2F3;
    }

    .title {
        text-align: center;
        position: relative;
    }

    .title h3 {
        font-weight: 600;
    }

    .sub-title {
        font-size: 1.25rem;
        color: #8B8F9686;
    }

    .title span {
        display: block;
        border-radius: 2px;
        width: 66px;
        height: 2px;
        background-color: #B49575;
        margin-top: 1.5em;
    }

    .contaner-desc {
        padding: 1em 0;
        margin-bottom: 2rem;
    }

    .description {
        font-size: 16px;
        color: #8B8F96;
        font-weight: 400;
        text-align: center;
        padding: 1rem 1rem 1rem 1rem;

    }

    .read-more>a {
        font-size: 14px;
        color: #B49575;
        font-weight: 600;
        cursor: pointer;
        text-decoration: none;
    }

    .custom-carousel-control {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        /* background-color: white !important; */
        /* background-color: rgba(0, 0, 0, 0.5); */
        display: flex;
        align-items: center;
        justify-content: center;
        top: 5em;
        border: none;
        /* outline: none; */
        transition: background-color 0.3s;
    }

    .custom-carousel-control:hover {
        background-color: rgba(0, 0, 0, 0.8);
    }

    /* .btn-circle {
        width: 45px;
        height: 45px;
        border-radius: 50%;
        background-color: #FFFFFF;
        display: flex;
        align-items: center;
        justify-content: center;
        border: none;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    } */
    .carousel-control-prev,
    .carousel-control-next {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        width: 45px;
        height: 45px;
        border-radius: 50%;
        background-color: #FFFFFF;
        display: flex;
        align-items: center;
        justify-content: center;
        border: none;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        z-index: 2;
    }

    .carousel-control-prev {
        left: 10px;
    }

    .carousel-control-next {
        right: 10px;
    }

    .btn-circle .fas {
        color: #B49575;
    }

    .btn-circle:focus {
        outline: none;
    }



    .custom-carousel-control .carousel-control-prev-icon,
    .custom-carousel-control .carousel-control-next-icon {
        width: 20px;
        height: 20px;
        color: #B49575;

    }

    .main-card-header {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        background-color: #8B8F96;
        z-index: 1;
    }

    .card-body .list {
        display: flex;
        align-items: center;
    }

    .list .list-group-item {
        /* margin: 0; */
        padding: 0.2rem;
        border: 0;
    }

    .card-body .list img {
        width: 5%;
        object-fit: cover;
        margin-right: 10px;
    }

    .card-body .list .list-group-item {
        margin: 0;
        padding-left: 0;
        list-style: none;
    }

    .list .refundable .list-group-item {
        color: #B49575;
    }

    .list .refundable {
        color: #B49575;
    }

    .form-radio .radio-form {
        width: 16px;
        height: 16px;
    }

    .form-radio {
        align-content: center;
        align-items: center;
    }

    .text-select-room>h4 {
        font-weight: 690;
    }


    .form-radio span {
        margin-left: auto;
        /* display: flex; */
        align-items: center;
    }

    input[type=radio] {
        accent-color: #a48686;
    }

    .float-end-custom {
        float: right;
        color: red;
    }

    .container-card {
        margin-bottom: 1.25rem;
        /* padding: 1rem; */
        border-radius: 10px;

    }

    .room-detail>a {
        text-decoration: none;
        text-align: center;
        font-weight: 500;
        font-size: 17px;
        color: #5392F9;
        cursor: pointer;
    }

    .text-decoration-line-through {
        text-decoration: line-through;
        color: gray;
        margin-left: 1rem;
    }

    .carousel-item>img {
        width: 100%;
        height: 18rem;
        object-fit: cover;
        border-top-right-radius: 10px;
        border-top-left-radius: 10px;
    }

    .carousel-item>#modal-img {
        width: 100%;
        height: 35rem;
        object-fit: cover;
    }

    .book-now button {
        background-color: #539104;
        color: white;
        border: none;
        padding: 10px 30px;
        border-radius: 10px;
        cursor: pointer;
        font-size: 15px;
        font-weight: 500;
    }

    .banner-back {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        height: 35em;
        background-color: rgba(0, 0, 0, 0.1);


    }

    .highlights>img {
        width: 7% !important;
        height: 100%;
        object-fit: cover;

    }

    .highlights-title {
        font-weight: 600;
        font-size: 3rem;
    }

    .text-description {
        font-size: 25px;
        color: gray;
        /* margin-bottom: 1rem; */
    }

    .thumbnail-wrapper {
        overflow: hidden;
        width: 100%;
        max-width: 600px;
        /* Adjust as needed */
        margin: auto;
        padding-top: 4rem;
    }

    .thumbnail-container {
        display: flex;
        transition: transform 0.5s ease-in-out;
    }

    .thumbnail {
        flex: 0 0 33.33%;
        /* Each thumbnail takes up one-third of the container's width */
        box-sizing: border-box;
        padding: 0 5px;
    }

    .thumbnail img {
        width: 100%;
        height: auto;
    }

    .container-title-thumbnail {
        position: absolute;
        bottom: 0;
        /* top: 3rem; */
        /* height: 0%; */
        padding: 0.5rem;
        color: #FFFFFF;
    }

    .progress-container {
        display: flex;
        /* justify-content: center; */
        align-items: center;
        width: 90%;
        float: left;

    }

    .progress {
        flex-grow: 1;
        margin-right: 10px;
        height: 10px;
    }

    .progress-bar {
        background-color: #B49575;
    }

    .progress-number {
        font-size: 2rem;
        color: #FFFFFF;

    }

    .thumbnail>img {
        width: 100%;
        height: 280px;
        object-fit: cover;
        border-radius: 10px;
        padding: 0 0 0 0;
    }

    .container-thumbnail {
        position: relative;
    }

    .carousel-item {
        transition: transform 0.5s ease-in-out;
    }

    .carousel-inner {
        overflow: hidden;
        height: 100%;
    }

    .banner-back {
        position: relative;
        transition: background-image 0.5s ease-in-out;
    }


    .thumbnail {
        cursor: pointer;
        position: relative;
    }

    .card-header>img {
        width: 100%;
        /* height: 280px; */
        object-fit: cover;
        border-top-right-radius: 10px;
        border-top-left-radius: 10px;
        /* border-radius: 9px; */
        padding: 0 0 0 0 !important;
    }

    .body-title>img {
        width: 10%;
    }

    .body-title>.card-title {
        font-weight: 600;
        font-size: 16px;
        color: #B49575;
    }

    .total-room {
        width: 4rem;
        height: 2rem;
        position: absolute;
        bottom: 2rem;
        right: 1.5rem;
        background-color: rgba(0, 0, 0, 0.3);
        border-radius: 18px;
        color: white;
        /* padding: 5px 10px; */
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
    }

    .total-room>img {
        width: 26%;
    }

    .round {
        position: relative;
        margin-top: 10px;
        align-items: center;
        display: flex;
    }

    .round label {
        background-color: #fff;
        border: 1px solid #ccc;
        border-radius: 50%;
        cursor: pointer;
        height: 20px;
        left: 0;
        position: absolute;
        top: 3px;
        width: 20px;
        margin: 0;
    }

    .round label:after {
        border: 2px solid #fff;
        border-top: none;
        border-right: none;
        content: "";
        height: 6px;
        left: 3px;
        opacity: 0;
        position: absolute;
        top: 5px;
        transform: rotate(-45deg);
        width: 12px;
    }

    .round input[type="checkbox"] {
        visibility: hidden;
    }

    .round input[type="checkbox"]:checked+label {
        background-color: #539104;
        border-color: #539104;
    }

    .round input[type="checkbox"]:checked+label:after {
        opacity: 1;
    }

    .checkbox-label-text {
        font-size: 14px;
        /* color: #333; */
        margin-left: 0.3rem;
        font-weight: 500;
    }

    .Facility-number>span {
        font-size: 3rem;
        font-weight: 600;

    }

    .Facility-title>h3 {
        font-weight: 600;
        font-size: 27px;
    }

    .Facility-button {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 2rem;
        /* margin-left: 4rem; */
        margin-top: 2rem;
    }

    a>.fas {
        font-size: 2rem;
        color: #B49575;
    }

    .comment-button {
        position: relative;
        top: 0;
        right: 2rem;
        display: flex;
        align-items: center;
        justify-content: right;
        gap: 1.5rem;
        z-index: 9999;
        margin-bottom: 1rem;
        /* margin-left: 4rem; */
        /* margin-top: 2rem; */
    }

    .text-comment {
        /* display: flex; */
        align-items: center;
        justify-content: center;

    }

    .title-section>span {
        display: block;
        width: 78px;
        height: 3px;
        background-color: #B49575;
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        /* margin-top: 1em; */
        /* top: 6rem; */
    }

    .hotel-image>img {
        /* position: absolute; */
        max-width: 70%;
        float: right;
        top: 0px;
        /* width: 30%; */
        height: auto;
        object-fit: cover;
        border-radius: 10px;
        padding: 0 0 0 0;
    }

    .comment-image>img {
        width: 100%;
        height: 500px;
        object-fit: cover;
        padding: 0 0 0 0;
    }

    .comment-name {
        display: flex;
        align-items: center;
    }

    .comment-name>strong {
        color: #B49575;
        font-size: 14px;
        font-weight: 400;
    }

    .comment-name::before {
        content: "";
        display: inline-block;
        width: 10px;
        height: 1px;
        background-color: #B49575;
        margin-right: 2px;
    }

    .comment-text>p {
        font-size: 18px;
        font-weight: 600;
    }



    @media(max-width: 375.6px) {
        .lightbox .lb-image {
            width: 100% !important;
            height: 20rem !important;
            object-fit: cover;
        }

        .container-popup-image img {
            height: 14rem !important;
        }

        .modal-dialog-centered.modal-dialog-scrollable .modal-content {
            max-height: 29cm;
            margin-top: -9em;
        }

        .navbar-brand .logo-img {
            max-width: 55%;
            height: auto;
            margin-left: 0 !important;
        }

        .navbar-light .navbar-toggler {
            position: absolute;
            right: 0;
            color: rgba(0, 0, 0, .5);
            border-color: white !important;
            /* float: right !important; */
        }

        .left-image {
            margin-bottom: 0.5rem;
        }

        .container-booking {
            position: relative;
            /* top: 1rem; */
            /* bottom: ; */
            /* display: flex; */
            margin-top: 0.5rem;
            align-items: center;
            justify-content: center;


        }

        .container-button {
            /* display: flex; */
            align-items: center;
            justify-content: center;

            padding: 0 0 0 0;
            margin: 0 0 0 0 !important;
        }

        .section-welcome-container {
            padding-top: 1.5rem !important;

        }

        .section-welcome-container .title {
            padding-top: 0 !important;

        }

        .title>h3 {
            font-size: 1.5rem !important;
        }


        .title span {

            margin-top: 4em;
            top: 1rem;
        }

        .contaner-desc {
            padding: 1.5rem !important;
            margin-top: 1rem;
        }

        .hotel-text {
            margin-left: 0 !important;
        }

        .total-room {
            top: 9rem;
            right: 2rem;
        }

        .main-card-header {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            background-color: #8B8F96;
            z-index: 1;
        }

        .main-card-header>h4 {
            font-size: 1.3rem !important;
        }

        .title-highlight img {
            margin-right: 5px;
            width: 1rem !important;
        }

        .list>img {
            width: 7% !important;
            object-fit: cover;
            margin-right: 11px !important;
        }

        .highlights-title {
            font-size: 1.5rem;
        }

        .banner-back>.flex-wrap>.pl-5 {
            padding-left: 1.3rem !important
        }

        .facility-image>img {
            padding: 1rem !important;
        }

        .title-section>h3 {
            margin-left: 0 !important;
        }

        .facility-details>.Facility-number,
        .Facility-title,
        .Facility-description {
            margin-left: 1rem !important;
            margin-right: 1rem !important;
        }

        .container-thumbnail {
            position: relative;
            right: 0 !important;
        }

        .hotel-image>img {
            /* position: absolute; */
            max-width: 100% !important;
            float: right;
            top: 0px;
            /* width: 30%; */
            height: auto;
            object-fit: cover;
            border-radius: 10px;
            padding: 0 0 0 0;
        }

        .thumbnail>img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 10px;
            padding: 0 0 0 0;
        }

        .button-category-image {
            gap: 10px;
        }
    }

    @media(max-width: 390.6px) {

        .lightbox .lb-image {
            /* width: 100% !important; */
            /* height: 20rem !important; */
            /* object-fit: cover; */
        }

        .lb-dataContainer {
            /* width: 320px !important; */
        }

        .lb-outerContainer {
            margin-top: 10rem !important;
            /* width: 320px !important;
            height: 246px !important; */
        }


        .button-category-image {
            overflow-x: auto;
            /* Horizontal scroll if buttons overflow */
            overflow-y: hidden;
            /* No vertical scroll */
            white-space: nowrap;
            /* Prevent buttons from wrapping to the next line */
        }

        .button-category {
            flex-shrink: 0;
            /* Prevent buttons from shrinking if the container is too small */
        }

        .button-category-image::-webkit-scrollbar {
            display: none;
        }

        .button-category-image .button-category {
            margin-right: 5px !important;
        }

        .popup-image {
            max-width: 100% !important;
        }

        .container-popup-image img {
            width: 100% !important;
            height: 14rem !important;
        }

        .modal-dialog-centered.modal-dialog-scrollable .modal-content {
            max-height: 21cm;
            /* margin-top: -9em; */
        }

        .section-welcome {
            margin-top: 2rem !important;
        }

        .left-image {
            margin-bottom: 0.5rem;
        }

        .container-button>.button-booking {
            margin: 3px;
        }

        .container-booking {
            position: relative !important;
            /* top: 1rem; */
            /* bottom: ; */
            /* display: flex; */
            margin-top: 0.5rem;
            align-items: center;
            justify-content: center;

        }

        .select-child>.p-3 {
            padding: 0.5rem;
        }

        .container-button {
            display: flex;
            align-items: center;
            justify-content: center;

            padding: 0 0 0 0;
            margin: 0 0 0 0 !important;
        }

        .section-welcome-container {
            padding-top: 1.5rem;

        }

        .section-welcome-container .title {
            padding-top: 0;

        }

        .title>h3 {
            font-size: 1.5rem !important;
        }


        .title span {
            margin-top: 2em;
            top: 3rem !important;
        }

        .contaner-desc {
            padding: 1.5rem !important;
            margin-top: 1rem;
        }

        .hotel-text {
            margin-left: 0 !important;
        }

        .total-room {
            top: 13rem !important;
            right: 2rem;
        }

        .main-card-header {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            background-color: #8B8F96;
            z-index: 1;
        }

        .main-card-header>h4 {
            font-size: 1.3rem !important;
        }

        .title-highlight img {
            margin-right: 5px;
            width: 1rem !important;
        }

        .list>img {
            width: 7% !important;
            object-fit: cover;
            margin-right: 11px !important;
        }

        .highlights-title {
            font-size: 1.5rem;
        }

        .banner-back>.flex-wrap>.pl-5 {
            padding-left: 1.3rem !important
        }

        .facility-image>img {
            padding: 1rem !important;
        }

        .title-section>h3 {
            margin-left: 0 !important;
        }

        .facility-details>.Facility-number,
        .Facility-title,
        .Facility-description {
            margin-left: 1rem !important;
            margin-right: 1rem !important;
        }

        .container-thumbnail {
            position: relative;
            right: 0 !important;
        }

        .hotel-image>img {
            /* position: absolute; */
            max-width: 100% !important;
            float: right;
            top: 0px;
            /* width: 30%; */
            height: auto;
            object-fit: cover;
            border-radius: 10px;
            padding: 0 0 0 0;
        }

        .thumbnail>img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 10px;
            padding: 0 0 0 0;
        }

        .button-category-image {
            gap: 10px;
        }
    }

    @media(max-width: 412.6px) {
        .button-category-image .button-category {
            /* margin-right: 0 !important; */
        }

        .popup-image {
            max-width: 100% !important;
        }

        .container-popup-image img {
            height: 14rem !important;
        }

        .navbar-brand .logo-img {
            max-width: 55%;
            height: auto;
            margin-left: 0 !important;
        }

        .navbar-light .navbar-toggler {
            position: absolute;
            right: 0;
            color: rgba(0, 0, 0, .5);
            border-color: white !important;
            /* float: right !important; */
        }

        .left-image {
            margin-bottom: 0.5rem;
        }

        .container-booking {
            position: relative;
            /* top: 1rem; */
            /* bottom: ; */
            /* display: flex; */
            margin-top: 0.5rem;
            align-items: center;
            justify-content: center;

        }

        .container-button {
            display: flex;
            align-items: center;
            justify-content: center;

            padding: 0 0 0 0;
            margin: 0 0 0 0 !important;
        }

        .section-welcome-container {
            padding-top: 1.5rem !important;

        }

        .section-welcome-container .title {
            padding-top: 0 !important;

        }

        .title>h3 {
            font-size: 1.5rem !important;
        }


        .title span {

            margin-top: 4em;
            top: 1rem;
        }

        .contaner-desc {
            padding: 1.5rem !important;
            margin-top: 1rem;
        }

        .hotel-text {
            margin-left: 0 !important;
        }

        .total-room {
            top: 9rem;
            right: 2rem;
        }

        .main-card-header {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            background-color: #8B8F96;
            z-index: 1;
        }

        .main-card-header>h4 {
            font-size: 1.3rem !important;
        }

        .title-highlight img {
            margin-right: 5px;
            width: 1rem !important;
        }

        .list>img {
            width: 7% !important;
            object-fit: cover;
            margin-right: 11px !important;
        }

        .highlights-title {
            font-size: 1.5rem;
        }

        .banner-back>.flex-wrap>.pl-5 {
            padding-left: 1.3rem !important
        }

        .facility-image>img {
            padding: 1rem !important;
        }

        .title-section>h3 {
            margin-left: 0 !important;
        }

        .facility-details>.Facility-number,
        .Facility-title,
        .Facility-description {
            margin-left: 1rem !important;
            margin-right: 1rem !important;
        }

        .container-thumbnail {
            position: relative;
            right: 0 !important;
        }

        .hotel-image>img {
            /* position: absolute; */
            max-width: 100% !important;
            float: right;
            top: 0px;
            /* width: 30%; */
            height: auto;
            object-fit: cover;
            border-radius: 10px;
            padding: 0 0 0 0;
        }

        .thumbnail>img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 10px;
            padding: 0 0 0 0;
        }

        .button-category-image {
            gap: 10px;
        }
    }

    @media(max-width: 430.6px) {
        .button-category-image .button-category {
            /* margin-right: 0 !important; */
        }

        .popup-image {
            max-width: 100% !important;
        }

        .container-popup-image img {
            height: 14rem !important;
        }

        .navbar-brand .logo-img {
            max-width: 55%;
            height: auto;
            margin-left: 0 !important;
        }

        .navbar-light .navbar-toggler {
            position: absolute;
            right: 0;
            color: rgba(0, 0, 0, .5);
            border-color: white !important;
            /* float: right !important; */
        }

        .left-image {
            margin-bottom: 0.5rem;
        }

        .container-booking {
            position: relative;
            /* top: 1rem; */
            /* bottom: ; */
            /* display: flex; */
            margin-top: 0.5rem;
            align-items: center;
            justify-content: center;

        }

        .container-button {
            display: flex;
            align-items: center;
            justify-content: center;

            padding: 0 0 0 0;
            margin: 0 0 0 0 !important;
        }

        .section-welcome-container {
            padding-top: 1.5rem !important;

        }

        .section-welcome-container .title {
            padding-top: 0 !important;

        }

        .title>h3 {
            font-size: 1.5rem !important;
        }


        .title span {

            margin-top: 4em;
            top: 1rem;
        }

        .contaner-desc {
            padding: 1.5rem !important;
            margin-top: 1rem;
        }

        .hotel-text {
            margin-left: 0 !important;
        }

        .total-room {
            top: 10rem;
            right: 2rem;
        }

        .main-card-header {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            background-color: #8B8F96;
            z-index: 1;
        }

        .main-card-header>h4 {
            font-size: 1.3rem !important;
        }

        .title-highlight img {
            margin-right: 5px;
            width: 1rem !important;
        }

        .list>img {
            width: 7% !important;
            object-fit: cover;
            margin-right: 11px !important;
        }

        .highlights-title {
            font-size: 1.5rem;
        }

        .banner-back>.flex-wrap>.pl-5 {
            padding-left: 1.3rem !important margin-top: 1rem !important
        }

        .facility-image>img {
            padding: 1rem !important;
        }

        .title-section>h3 {
            margin-left: 0 !important;
        }

        .facility-details>.Facility-number,
        .Facility-title,
        .Facility-description {
            margin-left: 1rem !important;
            margin-right: 1rem !important;
        }

        .container-thumbnail {
            position: relative;
            right: 0 !important;
        }

        .hotel-image>img {
            /* position: absolute; */
            max-width: 100% !important;
            float: right;
            top: 0px;
            /* width: 30%; */
            height: auto;
            object-fit: cover;
            border-radius: 10px;
            padding: 0 0 0 0;
        }

        .thumbnail>img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 10px;
            padding: 0 0 0 0;
        }

        .thumbnail-wrapper {
            padding-top: 1rem;
        }

        .button-category-image {
            gap: 10px;
        }
    }

    @media(max-width: 768.6px) {
        .button-category-image .button-category {
            /* margin-right: 0 !important; */
        }

        .popup-image {
            max-width: 100% !important;
        }

        .container-popup-image img {
            height: 14rem !important;
        }

        .navbar-brand .logo-img {
            max-width: 55%;
            height: auto;
            margin-left: 0 !important;
        }

        .navbar-light .navbar-toggler {
            position: absolute;
            right: 0;
            color: rgba(0, 0, 0, .5);
            border-color: white !important;
            /* float: right !important; */
        }

        .left-image {
            margin-bottom: 0.5rem;
        }

        .container-booking {
            position: relative;
            /* top: 1rem; */
            /* bottom: ; */
            /* display: flex; */
            margin-top: 0.5rem;
            align-items: center;
            justify-content: center;

        }

        .container-button {
            display: flex;
            align-items: center;
            justify-content: center;

            padding: 0 0 0 0;
            margin: 0 0 0 0 !important;
        }

        .section-welcome-container {
            padding-top: 1.5rem !important;

        }

        .section-welcome-container .title {
            padding-top: 0 !important;

        }

        .title>h3 {
            font-size: 1.5rem !important;
        }


        .title span {

            margin-top: 4em;
            top: 1rem;
        }

        .contaner-desc {
            padding: 1.5rem !important;
            margin-top: 1rem;
        }

        .hotel-text {
            margin-left: 0 !important;
        }

        .total-room {
            top: 10rem;
            right: 2rem;
        }

        .main-card-header {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            background-color: #8B8F96;
            z-index: 1;
        }

        .main-card-header>h4 {
            font-size: 1.3rem !important;
        }

        .title-highlight img {
            margin-right: 5px;
            width: 1rem !important;
        }

        .list>img {
            width: 7% !important;
            object-fit: cover;
            margin-right: 11px !important;
        }

        .highlights-title {
            font-size: 1.5rem;
        }

        .banner-back>.flex-wrap>.pl-5 {
            padding-left: 1.3rem !important
        }

        .facility-image>img {
            padding: 1rem !important;
        }

        .title-section>h3 {
            margin-left: 0 !important;
        }

        .facility-details>.Facility-number,
        .Facility-title,
        .Facility-description {
            margin-left: 1rem !important;
            margin-right: 1rem !important;
        }

        .container-thumbnail {
            position: relative;
            right: 0 !important;
        }

        .hotel-image>img {
            /* position: absolute; */
            max-width: 100% !important;
            float: right;
            top: 0px;
            /* width: 30%; */
            height: auto;
            object-fit: cover;
            border-radius: 10px;
            padding: 0 0 0 0;
        }

        .thumbnail>img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 10px;
            padding: 0 0 0 0;
        }

        .button-category-image {
            gap: 10px;
        }
    }

    @media(max-width: 820.6px) {
        .button-category-image .button-category {
            /* margin-right: 0 !important; */
        }

        .popup-image {
            max-width: 100% !important;
        }

        .container-popup-image img {
            height: 14rem !important;
        }

        .navbar-brand .logo-img {
            max-width: 55%;
            height: auto;
            margin-left: 0 !important;
        }

        .navbar-light .navbar-toggler {
            position: absolute;
            right: 0;
            color: rgba(0, 0, 0, .5);
            border-color: white !important;
            /* float: right !important; */
        }

        .left-image {
            margin-bottom: 0.5rem;
        }

        .left-image>.picture-gallery {
            display: flex;
            align-items: center;
            justify-content: center;
            float: right;
            position: absolute;
            right: 2rem !important;
            /* top: 12rem !important; */
            background-color: #FFFFFF;
            opacity: 0.8;
            border-radius: 26px;
        }

        .container-booking {
            position: relative;
            /* top: 1rem; */
            /* bottom: ; */
            /* display: flex; */
            margin-top: 0.5rem;
            align-items: center;
            justify-content: center;

        }

        .select-child>.p-3 {
            padding: 0 0 0 0;
        }

        .container-button {
            display: flex;
            align-items: center;
            justify-content: center;

            padding: 0 0 0 0;
            margin: 0 0 0 0 !important;
        }

        .section-welcome-container {
            padding-top: 1.5rem;

        }

        .section-welcome-container .title {
            padding-top: 0 !important;

        }

        .title>h3 {
            font-size: 1.5rem !important;
        }


        .title span {

            margin-top: 4em;
            top: 1rem;
        }

        .contaner-desc {
            padding: 1.5rem !important;
            margin-top: 1rem;
        }

        .hotel-text {
            margin-left: 0 !important;
        }

        .total-room {
            top: 10.5rem;
            right: 2rem;
        }

        .main-card-header {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            background-color: #8B8F96;
            z-index: 1;
        }

        .main-card-header>h4 {
            font-size: 1.3rem !important;
        }

        .title-highlight img {
            margin-right: 5px;
            width: 1rem !important;
        }

        .list>img {
            width: 7% !important;
            object-fit: cover;
            margin-right: 11px !important;
        }

        .highlights-title {
            font-size: 1.5rem;
        }

        .banner-back>.flex-wrap>.pl-5 {
            padding-left: 1.3rem !important
        }

        .facility-image>img {
            padding: 1rem !important;
        }

        .title-section>h3 {
            margin-left: 0 !important;
        }

        .facility-details>.Facility-number,
        .Facility-title,
        .Facility-description {
            margin-left: 1rem !important;
            margin-right: 1rem !important;
        }

        .container-thumbnail {
            position: relative;
            right: 0 !important;
        }

        .hotel-image>img {
            /* position: absolute; */
            max-width: 100% !important;
            float: right;
            top: 0px;
            /* width: 30%; */
            height: auto;
            object-fit: cover;
            border-radius: 10px;
            padding: 0 0 0 0;
        }

        .thumbnail>img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 10px;
            padding: 0 0 0 0;
        }

        .button-category-image {
            gap: 10px;
        }
    }

    @media(max-width: 1024.6px) {
        .text-comment {
            height: auto !important;
        }

        .button-category-image .button-category {
            /* margin-right: 0 !important; */
        }

        .popup-image {
            max-width: 100% !important;
        }

        .container-popup-image img {
            height: 14rem !important;
        }

        .navbar-brand .logo-img {
            max-width: 55%;
            height: auto;
            margin-left: 0 !important;
        }

        .navbar-light .navbar-toggler {
            position: absolute;
            right: 0;
            color: rgba(0, 0, 0, .5);
            border-color: white !important;
            /* float: right !important; */
        }

        .left-image {
            margin-bottom: 0.5rem;
        }

        .left-image>.picture-gallery {
            display: flex;
            align-items: center;
            justify-content: center;
            float: right;
            position: absolute;
            right: 3rem;
            /* top: 17rem; */
            background-color: #FFFFFF;
            opacity: 0.8;
            border-radius: 26px;
        }

        .container-booking {
            position: absolute;
            /* top: 1rem; */
            /* bottom: ; */
            /* display: flex; */
            margin-top: 0.5rem;
            align-items: center;
            justify-content: center;

        }

        .container-button {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0 0 0 0;
            margin: 0 0 0 0 !important;
        }

        .section-welcome-container {
            padding-top: 5rem;
            /* margin-top: 2rem !important; */

        }

        .section-welcome-container .title {
            padding-top: 2rem;

        }

        .title>h3 {
            font-size: 1.5rem !important;
        }


        .title span {
            margin-top: 2em;
            top: 4rem;
        }

        .contaner-desc {
            padding: 1.5rem !important;
            margin-top: 1rem;
        }

        .hotel-text {
            margin-left: 0 !important;
        }

        .total-room {
            top: 8rem;
            right: 2rem;
        }

        .main-card-header {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            background-color: #8B8F96;
            z-index: 1;
        }

        .main-card-header>h4 {
            font-size: 1.3rem !important;
        }

        .title-highlight img {
            margin-right: 5px;
            width: 1rem !important;
        }

        .list>img {
            width: 7% !important;
            object-fit: cover;
            margin-right: 11px !important;
        }

        .highlights-title {
            font-size: 1.5rem;
        }

        .banner-back>.flex-wrap>.pl-5 {
            padding-left: 1.3rem !important
        }

        .facility-image>img {
            padding: 1rem !important;
        }

        .title-section>h3 {
            margin-left: 0 !important;
        }

        .facility-details>.Facility-number,
        .Facility-title,
        .Facility-description {
            margin-left: 1rem !important;
            margin-right: 1rem !important;
        }

        .container-thumbnail {
            position: relative;
            right: 0 !important;
        }

        .hotel-image>img {
            /* position: absolute; */
            max-width: 100% !important;
            float: right;
            top: 0px;
            /* width: 30%; */
            height: auto;
            object-fit: cover;
            border-radius: 10px;
            padding: 0 0 0 0;
        }

        .thumbnail>img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 10px;
            padding: 0 0 0 0;
        }

        .checkbox-label-text p {
            margin-bottom: 0.5rem !important;
        }

        .description {
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .description.expanded {
            text-overflow: clip;
        }

        .button-category-image {
            gap: 10px;
        }

    }

    @media (max-width: 556px) {
        .comment-button {
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            top: 1rem;
            margin-left: 2rem;
        }

        .customer-content .text-comment {
            height: auto !important;
        }

        .lb-outerContainer {
            margin-top: 10rem !important;
            /* width: 320px !important;
            height: 246px !important; */
        }


        .button-category-image {
            overflow-x: auto;
            /* Horizontal scroll if buttons overflow */
            overflow-y: hidden;
            /* No vertical scroll */
            white-space: nowrap;
            /* Prevent buttons from wrapping to the next line */
        }

        .button-category {
            flex-shrink: 0;
            /* Prevent buttons from shrinking if the container is too small */
        }

        .button-category-image::-webkit-scrollbar {
            display: none;
        }

        .button-category-image .button-category {
            margin-right: 5px !important;
        }


        .popup-image {
            max-width: 100% !important;
        }

        .container-popup-image img {
            height: 12rem !important;
        }

        .text-description {
            font-size: 20px;
        }

        .thumbnail-title {
            font-size: 1rem;
        }

        .carousel-room {
            height: 250px;
        }

        .hotel-text {
            flex: none;
        }

        .total-room {
            top: 12rem !important;
            right: 2rem;
        }

        /* .carousel-item {
            transition: transform 0.6s ease-in-out;
            transform: translateX(100%);
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height:100%;
        } */
        .text-description {
            font-size: 20px;
        }

        .thumbnail-title {
            font-size: 1rem;
        }

        .container-booking {
            top: 1rem !important;
            margin-top: 0 !important;
        }

        .px-5 {
            padding-left: 0.5rem !important;
            padding-right: 0.5rem !important;
        }

        .title>h3 {
            font-size: 1.25rem !important;
        }

        .modal-dialog {
            max-width: 100% !important;
        }

        .carousel-item>#modal-img {
            height: 18rem !important;
        }

        .carousel-item-prev {
            transform: translateX(-100%);
        }

        .px-5 {
            padding-left: 0.5rem !important;
            padding-right: 0.5rem !important;
        }

        .title>h3 {
            font-size: 1.25rem !important;
        }

        .section-welcome {
            margin-top: 1rem;
        }

        .title span {
            margin-top: 2em;
            /* top: 1rem !important; */
        }

        .section-title {
            font-size: 1.6rem;
        }

        .sub-title {
            font-size: 1.1rem;
        }

        .modal-dialog {
            max-width: 100% !important;
        }

        .carousel-item>#modal-img {
            height: 18rem !important;
        }

        .pay-card {
            justify-content: start !important;
        }

        .description {
            text-align: start !important;
        }

        .button-category-image {
            gap: 10px;
        }

        .customer-content .text-comment {
            padding-left: 0 !important;
            padding-right: 0 !important;
        }
    }

    @media (min-width: 78rem) {
        .section-78rem {
            padding-left: 0 !important;
            padding-right: 0 !important;
            margin-left: 0 !important;
            margin-right: 0 !important;
        }

        .content-footer.section-78rem {
            margin-left: auto !important;
            margin-right: auto !important;
        }

        .section-78rem.banner .row>div:first-child {
            padding-left: 0 !important;
            padding-right: 0 !important;
        }

        .section-78rem.banner .row>div:last-child {
            padding-right: 0 !important;
        }

        .section-78rem.banner {
            margin-bottom: 20px !important;
            margin-top: 20px !important;
        }

        .navbar-nav {
            .navbar-nav {
                margin-right: 0 !important;
            }

            .navbar-brand .logo-img {
                margin-left: 0 !important;
            }
        }
    }


    .div.sticky {
        position: sticky;
        top: 0;
        z-index: 1000;
        background-color: white;
    }

    .pop-up-body {
        max-height: 70vh;
        overflow-y: auto;
    }


    .popup-image {
        max-width: 80%;
    }

    .button-category-image .button-category {
        margin-right: 15px;
        border-radius: 20px;
        border: 1px solid #818494;
        /* border: none; */
        background-color: #fff;
        color: #818494;
        font-size: 12px;
        padding: .375rem .75rem;
        display: inline-block;
    }

    .button-category.active {
        border: 2px solid #000932;
        background-color: #ecf4fd;
    }

    .button-category:hover {
        background-color: #ecf4fd;
    }

    .container-popup-image img {
        width: 100%;
        height: 21rem;
        object-fit: cover;
    }

    /* Disable fade animation */
    #galleryModal .popup-image {
        transition: none !important;
    }

    .lightbox .lb-image {
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        height: auto;
        /* max-width: inherit;
        max-height: none; */
        border-radius: 3px;
        border: none !important;
        /* width: 80rem;
        height: 35rem ; */
        margin: 0 auto;
        object-fit: cover;
    }

    .button-category-image {
        overflow-x: auto;
        /* Horizontal scroll if buttons overflow */
        overflow-y: hidden;
        /* No vertical scroll */
        white-space: nowrap;
        /* Prevent buttons from wrapping to the next line */
    }

    .button-category {
        flex-shrink: 0;
        /* Prevent buttons from shrinking if the container is too small */
    }

    .button-category-image::-webkit-scrollbar {
        display: none;
    }


    /* .lb-outerContainer {
    position: relative;
    width: 250px;
    height: 250px;
    margin: 0 auto;
    border-radius: 4px;
    background-color: #fff;*/
    .video-link {
        display: flex;
        align-items: center;
        font-size: 18px;
        color: black;
        text-decoration: none;
    }

    .video-link>h5:hover {
        color: #B49575;
        text-decoration: #B49575 underline !important;
    }
    .video-item .overlay {
        /* display: flex;
        align-items: center;
        justify-content: center; */
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: transparent;
        /* pointer-events: none; */
        /* background-color: #63E6BE; */
    }
</style>
