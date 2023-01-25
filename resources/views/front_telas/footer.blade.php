
<style>
    a{
        color: #fff;
        text-decoration: none !important;
    }

    .navbar-brand{
        display: flex;
    }

    .navbar-brand h5{
        padding-left: 15px;
    }

    .icones{
        /* display: flex; */
        justify-content: space-between;
    }

    .icones a{
        padding-left: 15px;
    }

    span{
        color: #fff;
    }

    .copy{
        display: none;
    }

    .copy span{
        border-top: 1px solid rgba(255, 255, 255, 0.219);
        text-align: center;
        padding-top: 10px;
        margin-top: 10px;

        /* alinhar no centro */
        display: flex;
        justify-content: center;

    }

    @media (max-width: 700px) {
        .copyright{
            display: none;
        }

        .copy{
            display: block;
        }
    }

</style>

<nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
        
        <div>
            <a class="navbar-brand" href="#">
                <h6>SISU MED</h6>
            </a>
        </div>

        <div class="copyright">
            <span>
                Copyright © 2023 - Todos os direitos reservados
            </span>
        </div>

        <div class="icones">
            <a href="https://www.facebook.com/sabrinaoliveirabh" target="_blank">
                <img src="https://img.icons8.com/ios-filled/50/ffffff/facebook-new.png" alt="facebook" width="30" height="30" class="d-inline-block align-text-top">
            </a>

            <a href="https://www.instagram.com/sabrinaoliveirabh/" target="_blank">
                <img src="https://img.icons8.com/ios-filled/50/ffffff/instagram-new.png" alt="instagram" width="30" height="30" class="d-inline-block align-text-top">
            </a>

            <a href="https://www.youtube.com/channel/UCrRzuI8W7qlD1ZUse4ctF6A" target="_blank">
                <img src="https://img.icons8.com/ios-filled/50/ffffff/youtube.png" alt="youtube" width="30" height="30" class="d-inline-block align-text-top">
            </a>

            <a href="https://www.cursovemmed.com.br/" target="_blank">
                <img src="https://img.icons8.com/ios-filled/50/ffffff/web.png" alt="web" width="30" height="30" class="d-inline-block align-text-top">
            </a>
        </div>

        <div class="col-12 copy">
            <span>
                Copyright © 2023 - Todos os direitos reservados
            </span>
        </div>

      
    </div>
  </nav>