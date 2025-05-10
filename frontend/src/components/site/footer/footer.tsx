'use client'

import style from './footer.module.css'
import { FaInstagram, FaFacebook, FaLinkedin } from "react-icons/fa";


export default function Footer() {
  return (
    <footer className={style.footer}>
      <div className={style.footer_content}>
        <p>© 2025 AMOTORS. Todos os direitos reservados.</p>
        <p>Desenvolvido por: Léo Cassin Scardini</p>
        <p>Contato: <a href="mailto:">example@mail.com</a></p>
        <div className={style.social_media}>
          <a href="/" className={style.social_links} id='instagram' title="Instagram">
            <FaInstagram/>
          </a>
          <a href="/" className={style.social_links} id='facebook' title="Facebook">
            <FaFacebook/>
          </a>
          <a href="/" className={style.social_links} id='linkedin' title="Linkedin">
            <FaLinkedin/>
          </a>
        </div>
      </div>
    </footer>
  );}