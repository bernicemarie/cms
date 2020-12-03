
        function _delete(event) {
           if (!confirm("Voulez-vous supprimer cette ligne ?")) { 
               event.preventDefault()
           }
        }
   