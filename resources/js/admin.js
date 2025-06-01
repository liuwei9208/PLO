import './bootstrap'

const searchForm = document.getElementById('search_form')
const searchFormShop = document.getElementById('search_form_shop')
const searchFormPublic = document.getElementById('search_form_public')
const searchFormLimit = document.getElementById('search_form_limit')
if (searchFormShop) {
  searchFormShop.addEventListener('change', () => {
    searchForm.submit()
  })
}
if (searchFormPublic) {
  searchFormPublic.addEventListener('change', () => {
    searchForm.submit()
  })
}
if (searchFormLimit) {
  searchFormLimit.addEventListener('change', () => {
    searchForm.submit()
  })
}

const castProfileUrlOrigin = document.getElementById('cast_profile_url_origin')
const castProfileUrlPath = document.getElementById('cast_profile_url_path')
document.addEventListener('DOMContentLoaded', () => {
  if (!castProfileUrlOrigin || !castProfileUrlPath) return
  castProfileUrlPath.style.paddingLeft = `${castProfileUrlOrigin.offsetWidth + 12}px`
})

class Modal {
  constructor(params) {
    this.modal = document.querySelector(params.modal)
    this.opener = document.querySelector(params.opener)

    if (!this.modal || !this.opener) return

    this.closer = this.modal.querySelectorAll(params.closer)

    if (!this.closer) return

    this.opener.addEventListener('click', () => this.open())
    this.closer.forEach((el) => {
      el.addEventListener('click', () => this.close())
    })
  }

  open() {
    this.modal.style.display = 'flex'
  }

  close() {
    this.modal.style.display = 'none'
  }
}

new Modal({
  modal: '#deleteModal',
  opener: '#deleteModalOpener',
  closer: '.modal-close-btn',
})

new Modal({
  modal: '#publishModal',
  opener: '#publishModalOpener',
  closer: '.modal-close-btn',
})

new Modal({
  modal: '#unpublishModal',
  opener: '#unpublishModalOpener',
  closer: '.modal-close-btn',
})
