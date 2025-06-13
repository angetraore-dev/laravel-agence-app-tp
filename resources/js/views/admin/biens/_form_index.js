//resources/js/views/admin/biens/form_index.js
//View: resources/views/admin/biens/_form.blade.php
document.addEventListener('DOMContentLoaded', () => {
    console.info('admin biens Global JS successfully loaded !!')
    let immobilierType = document.getElementById('type')

    const displayimmobilierTypeSelected = () => {

        if (immobilierType.value == 'appartement'){

            document.getElementById('appartementsDiv').classList.remove('hidden')
            document.getElementById('appartementsDiv').classList.add('border-2')
            document.getElementById('appartementsDiv').classList.add('border-primary')

            localStorage.setItem('typeDiv', 'appartementsDiv')

        } else if (immobilierType.value == 'maison'){

            document.getElementById('maisonDiv').classList.remove('hidden')
            document.getElementById('maisonDiv').classList.add('border-2')
            document.getElementById('maisonDiv').classList.add('border-primary')

            localStorage.setItem('typeDiv', 'maisonDiv')

        } else{

            document.getElementById('terrainDiv').classList.remove('hidden')
            document.getElementById('terrainDiv').classList.add('border-2')
            document.getElementById('terrainDiv').classList.add('border-primary')
            localStorage.setItem('typeDiv', 'terrainDiv')
        }
    }
    displayimmobilierTypeSelected()
    immobilierType.addEventListener('change', function (e){
        document.getElementById(""+localStorage.getItem('typeDiv')).classList.add('hidden')
        document.getElementById(""+localStorage.getItem('typeDiv')).classList.remove('border-2')
        document.getElementById(""+localStorage.getItem('typeDiv')).classList.remove('border-primary')
        displayimmobilierTypeSelected()
    })

})
