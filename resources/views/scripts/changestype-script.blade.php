<!-- resources/views/scripts/changestype-script.blade.php -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Vérifie si des erreurs de validation existent
        const errors = @json($errors->all()); // Laravel injecte les erreurs ici
        if (errors.length > 0) {
            // Récupère le premier champ ayant une erreur
            const firstErrorField = document.querySelector('.is-invalid');
            if (firstErrorField) {
                firstErrorField.scrollIntoView({ behavior: 'smooth', block: 'center' });
            }
        }

        // Écouter le changement de type de client pour ajuster ICE et IF
        const typeClientField = document.getElementById('type_client');
        const iceField = document.getElementById('ICE');
        const ifField = document.getElementById('IF');

        // Fonction de mise à jour des champs ICE et IF
        function updateIceIfFields() {
            if (typeClientField.value === 'particulier') {
                iceField.value = '000000000000000';
                ifField.value = '00000000';
                iceField.setAttribute('readonly', 'true');
                ifField.setAttribute('readonly', 'true');
            } else {
                iceField.value = '';
                ifField.value = '';
                iceField.removeAttribute('readonly');
                ifField.removeAttribute('readonly');
            }
        }

        // Initialiser les valeurs de ICE et IF au cas où le formulaire est pré-rempli
        updateIceIfFields();

        // Mettre à jour les champs ICE et IF dès que le type de client change
        typeClientField.addEventListener('change', updateIceIfFields);
    });
</script>
