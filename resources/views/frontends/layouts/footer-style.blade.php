<style>
    .icon-circle {
        align-content: center;
        align-items: center;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        display: flex;
        background-color: white;
        margin: 5px;
        gap: 20px;
    }

    .icon-circle>a>img {
        object-fit: cover;
    }

    .follow-us>p,
    .contactus>p {
        color: gray;
        font-size: 16px;
        font-weight: 400;
    }

    .follow-us>h4,
    .contactus>h4,
    .payment>h4 {
        font-weight: 600;
    }

    .pay-card .visa img {
        width: 100%;
        border-radius: 5px;
        /* height: 100%; */
        object-fit: cover;
    }

    .pay-card .visa {
        width: 74px;
        border-radius: 5px;
        /* height: 100px; */
        display: flex;
        align-items: center;
        justify-content: center;
        /* background-color: #b42929; */
        margin: 5px;
    }

    .copy-container {
        background-color: #B49575;

    }

    .angkor-copy-right {
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        /* margin-top: 15px; */
        height: 40px;
        font-size: 16px;
    }

    .angkor-copy-right .text-copy-right {
        color: gray;
        font-weight: 400;
    }

    @media (max-width: 390px) {
        .follow-us {
            margin-bottom: 1em !important;
        }

        .angkor-copy-right .text-copy-right {
            color: gray;
            font-weight: 400;
        }
    }

    @media (min-width: 1400px) {
        .payment {
            padding-left: 3rem !important;
        }

        .contactus {
            padding-left: 3rem !important;
        }
    }
</style>
