'use client'

import { useEffect, useMemo, useState } from 'react'
import style from './page.module.css'
import { vehicleType } from '@/types/vehicle'
import { toast, useToast } from '@/components/use-toast'
import { api } from '@/services/api'
import Card from '@/components/site/card/card'
import Navbar from '@/components/site/navbar/navbar'
import Footer from '@/components/site/footer/footer'
import Modal from '@/components/site/modal/modal'
import CategoryNavbar from '@/components/site/categoryNavbar/categoryNavbar'
import { categoryType } from '@/types/category'

export default function Page() {
  const [vehicles, setVehicles] = useState<vehicleType[]>([])
  const [open, setOpen] = useState<boolean>(false)
  const [selectedVehicle, setSelectedVehicle] = useState<vehicleType | null>(null)
  const [categories, setCategories] = useState<categoryType[]>([])
  const [selectedCategory, setSelectedCategory] = useState<string>('Todos')


  const requestVehicles = async () => {
    const { response } = await api<vehicleType[]>('GET', `/veiculos`)
    if (response) {
      setVehicles(response)
    } else {
      toast({ title: 'Veículos não encontrados' })
    }
  }

  const requestCategories = async () => {
    const { response } = await api<categoryType[]>('GET', `/categorias`)
    if (response) {
      setCategories(response)
    } else {
      toast({ title: 'Categorias não encontradas' })
    }
  }

  useEffect(() => {
    requestVehicles()
    requestCategories()
  }, [])

  const[busca, setBusca] = useState<string>('')
  
  const vehicleFiltered = useMemo(() => {
    const lowerBusca = busca.toLowerCase()
    return vehicles.filter((vehicle) => {
      const matchesBusca =
        vehicle.nome.toLowerCase().includes(lowerBusca) ||
        vehicle.marca.toLowerCase().includes(lowerBusca)
  
      const matchesCategoria =
        selectedCategory === 'Todos' || vehicle.categoria.nome === selectedCategory
  
      return matchesBusca && matchesCategoria
    })
  }, [busca, vehicles, selectedCategory])
  
  return (
    <>
      <div className={style.page}>
        <Navbar logo="./site/amotors.png" />
        <div className={style.center}>
          <CategoryNavbar
            categories={categories}
            selectedCategory={selectedCategory}
            setSelectedCategory={setSelectedCategory}
            busca={busca}
            setBusca={setBusca}
          />
          <h1 className={style.title}>Veiculos</h1>
          <div className={style.wrapper}>
          {vehicleFiltered?.map((vehicle, index) => (
              <Card
                key={index}
                vehicle={vehicle}
                onClick={() => {
                  setOpen(!open);
                  setSelectedVehicle(vehicle);
                }}
              />
            ))}
          </div>
          </div>
          <Modal isOpen={open} setOpen={setOpen} vehicle={selectedVehicle} requestVehicles={requestVehicles} />
        <Footer/>
      </div>
    </>
  )
}
