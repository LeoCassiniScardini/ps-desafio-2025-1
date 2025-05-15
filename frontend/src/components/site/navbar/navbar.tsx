'use client'

import { useEffect, useState } from 'react';
import style from './navbar.module.css'
import { LiaUserSlashSolid } from "react-icons/lia";
import { RiAdminLine } from "react-icons/ri";
import { getSession } from 'next-auth/react';
import { useToast } from '@/components/use-toast';

interface NavbarProps {
  logo: string
}

export default function Navbar({logo}: NavbarProps) {

  const [isAuth, setIsAuth] = useState<boolean>(false)
  const { toast } = useToast()

  useEffect(() => {
    const requestDataSession = async () => {
      const sessionResponse = await getSession()
      if (sessionResponse) {
        setIsAuth(!!sessionResponse.user)
      }else{
        toast({
          title: 'Voce não está logado',
        })
      }
    }
    requestDataSession()
  }, [toast])

  return (
    <nav className={style.navbar}>
      <div className={style.center}>
      <div className={style.navbar_nav}>
        <a href="/">
          <img src={logo} alt="Logo" className={style.logo} />
        </a>
      </div>
      <ul className={style.links}>
        <li><a href="/">Loja</a></li>
        <li><a href="/">Categorias</a></li>
        <li><a href="/">Veiculos</a></li>
        <li><a href="/admin" className={style.icon_button}>
        
          {isAuth ? <RiAdminLine />: <LiaUserSlashSolid />}
        </a></li>
      </ul>
      </div>
    </nav>
  )
}