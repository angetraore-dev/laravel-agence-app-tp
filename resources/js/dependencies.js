import Swal from "sweetalert2";
window.Swal = Swal;
export const baseUrl = () => {
    let url
    let pathParts = location.pathname.split('/')

    if (location.host == 'location:8000'){

        url = location.origin+'/'+pathParts[1].trim('/')+'/'
    }else {
        url = location.origin
    }
    return url
}

export const ConstToast = Swal.mixin({
    toast: true,
    position: 'center',
    iconColor: 'white',
    customClass: {
        popup: 'colored-toast',
    },
    showConfirmButton: false,
    showCancelButton: false,
    confirmButtonColor: '#45bd45',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Oui',
    cancelButtonText:'Annuler',
    timer: 2000,
    timerProgressBar: true,
    didOpen(popup) {
        popup.addEventListener('mouseenter', Swal.stopTimer);
        popup.addEventListener('mouseleave', Swal.resumeTimer)
    }
})
