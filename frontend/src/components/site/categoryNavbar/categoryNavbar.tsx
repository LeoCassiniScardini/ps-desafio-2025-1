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
  return (
    <div className={style.navbar}>
      <div className={style.buttons}>
        <input
        type="text"
        value={busca}
        onChange={(e) => setBusca(e.target.value)}
        placeholder="Digite sua busca"
        className={style.input}
      />
        <button
          className={style.category}
          onClick={() => setSelectedCategory('Todos')}
        >
          Todos
        </button>
        {categories.map((category) => (
          <button
            key={category.id}
            className={style.category}
            onClick={() => setSelectedCategory(category.nome)}
          >
            {category.nome}
          </button>
        ))}
      </div>
      
    </div>
  )
}
