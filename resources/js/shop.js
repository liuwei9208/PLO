import Scroll from './shop/Scroll'
import Header from './shop/Header'
import Drawer from './shop/Drawer'


/** Scroll */
const scroll = new Scroll()

/** Header */
const header = new Header()

/** Drawer */
const drawer = new Drawer({ scroll: scroll })
