'use client'

import { useState } from 'react'
import style from './categoryNavbar.module.css'
import { categoryType } from '@/types/category'


type Props = {
  categories: categoryType[]
  selectedCategory: string
  setSelectedCategory: (value: string) => void
  busca: string
  setBusca: (value: string) => void
}

export default function CategoryNavbar({
  categories,
  selectedCategory,
  setSelectedCategory,
  busca,
  setBusca
}: Props) {

  const [activeButton, setActiveButton] = useState('Todos');

  const handleButton = (buttonId: string) => {
    setActiveButton(buttonId);
  };

  return (
    <div className={style.navbar}>
      <div className={style.buttons}>
        <input
        type="text"
        value={busca}
        onChange={(e) => setBusca(e.target.value)}
        placeholder={"Digite sua busca"}
        className={style.input}
      />
        <button
          onClick={() => { setSelectedCategory('Todos'); handleButton('Todos'); }}
          className={activeButton === 'Todos' ? style.categoryActive: style.category}
        >
          Todos
        </button>
        {categories.map((category) => (
          <button
            key={category.id}
            onClick={() => { setSelectedCategory(category.nome); handleButton(category.nome); }}
            className={activeButton === category.nome ? style.categoryActive: style.category}
          >
            {category.nome}
          </button>
        ))}
      </div>
      
    </div>
  )
}
