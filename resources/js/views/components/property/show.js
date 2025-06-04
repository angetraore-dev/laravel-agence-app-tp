import '../../../bootstrap.js'

document.addEventListener('DOMContentLoaded', () => {
    console.info('show js is successfully loaded\'resources/js/views/components/show\'')

    //Modal Running
    document.getElementById('contactPop').addEventListener('click', () => {
        document.getElementById('default-modal').classList.remove('hidden')
    })

    document.querySelectorAll('.default-modal-close').forEach(e => {
        e.addEventListener('click', () => {
            document.getElementById('default-modal').classList.add('hidden')
        })
    })
    //End Modal


})
