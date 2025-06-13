import '../../../bootstrap.js'

document.addEventListener('DOMContentLoaded', () => {
    console.info('show js is successfully loaded\'resources/js/views/components/show\'')
    const form = document.querySelectorAll('form')
    //Modal Running
    document.getElementById('contactPop').addEventListener('click', () => {
        document.getElementById('contact_form').classList.remove('hidden')
    })

    document.querySelectorAll('.default-modal-close').forEach(e => {
        e.addEventListener('click', () => {
            document.getElementById('default-modal').classList.add('hidden')
        })
    })
    //End Modal

    document.getElementById('send_contact_form').addEventListener('submit', (e)=>{
        e.preventDefault()
        alert('canceled')
        const formData = new FormData(document.querySelectorAll('form'));
        console.log(formData)
    })

})


//Modal Running
//     document.getElementById('contactPop').addEventListener('click', () => {
//         document.getElementById('default-modal').classList.remove('hidden')
//     })
//
//     document.querySelectorAll('.default-modal-close').forEach(e => {
//         e.addEventListener('click', () => {
//             document.getElementById('default-modal').classList.add('hidden')
//         })
//     })
//End Modal
