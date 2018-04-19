<script>
function validateForm(nom) {
    if (confirm("Vous désirez envoyer "+nom+"?")) {
        return true
    }
    else {
        return false;
    }

}
</script>
