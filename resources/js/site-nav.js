const toggle = document.querySelector('[data-site-nav-toggle]')
const panel = document.querySelector('[data-site-nav-panel]')

if (toggle && panel) {
    const openIcon = toggle.querySelector('[data-site-nav-icon="open"]')
    const closeIcon = toggle.querySelector('[data-site-nav-icon="close"]')

    const setOpen = (isOpen) => {
        toggle.setAttribute('aria-expanded', String(isOpen))
        panel.dataset.open = String(isOpen)
        openIcon.classList.toggle('hidden', isOpen)
        closeIcon.classList.toggle('hidden', !isOpen)
    }

    toggle.addEventListener('click', () => {
        setOpen(toggle.getAttribute('aria-expanded') !== 'true')
    })

    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape' && toggle.getAttribute('aria-expanded') === 'true') {
            setOpen(false)
            toggle.focus()
        }
    })

    window.matchMedia('(min-width: 48rem)').addEventListener('change', (event) => {
        if (event.matches) {
            setOpen(false)
        }
    })
}
