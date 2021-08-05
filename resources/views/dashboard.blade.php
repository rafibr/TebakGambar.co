<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>ArchitectUI - Vuejs & Bootstrap 4 & Vuetify Admin UI Dashboard Template</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900">

    <script src="{{ asset('js/app.js') }}"></script>

</head>

<body>
    <noscript>
        <strong>We're sorry but ArchitectUI doesn't work properly without JavaScript enabled. Please enable it to
            continue.</strong>
    </noscript>
    <div id="app">
        <h1 v-text="'Hello, '+ title"></h1>
        <header-component></header-component>
        <router-view></router-view>
        <footer-component></footer-component>
    </div>
    <!-- built files will be auto injected -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
