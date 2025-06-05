<?php
//htmlspecialchars permet d'encoder avec utf-8 et empecher tout injection de type <script></script>
function secu($text){
    return htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
}