<footer class="footer">
    <div class="container">
        <div class="text-center">
            Copyright © {{ date('Y') }} Rocker Admin
        </div>
    </div>
</footer>

<style>
    html, body {
        height: 100%;
        margin: 0;
    }
    body {
        display: flex;
        flex-direction: column;
    }
    main {
        flex: 1; /* konten isi ruang */
    }
    .footer {
        background: #fff;
        padding: 10px 0;
        text-align: center;
        box-shadow: 0 -1px 5px rgba(0,0,0,0.1);
    }
</style>
