import '../../../bootstrap.js'

document.addEventListener('DOMContentLoaded', () => {
    console.info('card js loaded path: \'resources/views/components/property/card\'')

    let propertyCards = document.querySelectorAll('div#propertyCard')
    //Div clicked launch Show Link
    propertyCards.forEach((propertyCard) => {
        propertyCard.addEventListener('click', function (){
            let url = (this).getAttribute('data-href')
            if(url)
                window.location.href = url
        })
    })


})
