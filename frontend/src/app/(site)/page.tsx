'use client'

import { useEffect, useState } from 'react'
import style from './style.module.css'
import { vehicleType } from '@/types/vehicle'
import { toast, useToast } from '@/components/use-toast'
import { api } from '@/services/api'
import Card from '@/components/site/card/card'
import Navbar from '@/components/site/navbar/navbar'
import Footer from '@/components/site/footer/footer'
import Modal from '@/components/site/modal/modal'

export default function Home() {
  const [vehicles, setVehicles] = useState<vehicleType[]>([])
  const [selectedVehicle, setSelectedVehicle] = useState<vehicleType | null>(null)
  const [isOpen, setIsOpen] = useState(false)

  useEffect(() => {
    const requestData = async () => {
      const { response } = await api<vehicleType[]>('GET', `/veiculos`)
      if (response) {
        setVehicles(response)
      }else{
        toast({
          title: 'Veiculos não encontrados',
        })
      }
    }
    requestData()
  }, [toast])

  

  return (
    <>
      <div className={style.page}>
        <Navbar logo="./site/amotors.png" />
        <h1 className={style.title}>Veiculos</h1>
        <div className={style.wrapper}>
        {vehicles?.map((vehicle, index) => (
            <Card key={index} vehicle={vehicle} onClick={() => {
                setSelectedVehicle(vehicle)
                setIsOpen(true)
              }}
            />
          ))}
        </div>
        <Modal open={isOpen} onClose={() => setIsOpen(false)} vehicle={selectedVehicle} />
        <Footer/>
      </div>
    </>
  )
}
