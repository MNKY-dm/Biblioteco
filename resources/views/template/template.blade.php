<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset("css/templatemo/css/bootstrap.min.css") }}">
    <link rel="stylesheet" href="{{ asset("css/templatemo/fontawesome/css/all.min.css") }}">
    <link rel="stylesheet" href="{{ asset("css/templatemo/css/templatemo-style.css") }}">
    <!--

    TemplateMo 556 Catalog-Z

    https://templatemo.com/tm-556-catalog-z

    -->
</head>
<body>
    @include("template.loader")
    @include("template.header")
    @include("template.navbar")
    @yield("content")
    @include("template.footer")
    @include("template.jsloader")
</body>
</html>
