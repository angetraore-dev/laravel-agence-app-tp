document.addEventListener('DOMContentLoaded', () => {
    console.info('admin index js successfully loaded !!')

    let Swidth = screen.width;
    let contentDiv = document.getElementById('content')

    const openNav = () => {
        document.getElementById("mySidenav").classList.remove('w-0')
        document.getElementById('menuContainer').style.width = "25%"
        document.getElementById("mySidenav").classList.add('w-auto')
    }
    const closeNav = () => {
        document.getElementById("mySidenav").classList.remove('w-auto')
        document.getElementById("mySidenav").classList.add('w-0')
        document.getElementById('menuContainer').style.width = 0

    }
    document.getElementById('open').addEventListener('click', openNav)
    document.getElementById('openSide').addEventListener('click', () => openNav())

    document.getElementById('close').addEventListener('click', () => closeNav())

    if ( Swidth >= Number(768) ){
        openNav()
    }else {
        closeNav()
    }
    let autoResize = () => {
        if (screen.width >= Number(768)){ openNav() }
    }
    window.addEventListener('resize', (event) => { autoResize() })
    addEventListener('resize', (event) => { autoResize()})




})
